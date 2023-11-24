<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\cus_account;

use  Session;

class SignInUp extends Controller
{
    //function login
    public function login()
    {
        return view('Customer.CusLogin');
    }
    public function postCusLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard'); // Redirect to the intended page after login
        }

        return redirect()->route('CusLogin')->with('error', 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.');
    }
    public function register()
    {
        return view('Customer.CusRegister');
    }

    public function postCusRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (cus_account::where('email', $request->email)->exists()) {
            return redirect('/CusRegister')->with('error', 'Email đã tồn tại. Vui lòng chọn một email khác.');
        }

        $cus = cus_account::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log in the user after registration
        Auth::login($cus);

        return redirect('/shop')->with('success', 'Đăng ký thành công!');

    }
}
 