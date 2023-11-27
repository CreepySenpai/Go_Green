<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\cus_account;

class SignInUp extends Controller
{
    //function login
    public function login()
    {
        return view('Customer.CusLogin');
    }
    // public function postCusLogin(Request $data)
    // {
    //     dd($data->all());

    //     $credentials = [
    //         'email' => $data->cus_email,
    //         'password' => $data->cus_password,
    //     ];    

    //     if (Hash::check('plain-text', $data->cus_password)) {
    //         // The passwords match...
    //     }

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed
    //         return redirect()->intended(route(name: 'shop'));
    //     } else {
    //         return redirect(route(name:'CusLogin'))->with('error', 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.');
    //     }
    // }

    public function postCusLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $cus = cus_account::where('cus_email', $request->email)->first();
    
        if (!$cus || !Hash::check($request->password, $cus->cus_password)) {
            // Authentication failed
            return redirect(route(name:'CusLogin'))->with('error', 'Đăng nhập không thành công. Vui lòng kiểm tra lại email và mật khẩu.');
        }
        
        // dd($request->all());
        // Authentication passed
        $request->session()->put('LoginID',$cus->id);
        return redirect()->intended(route(name:'shop')); // Redirect to the intended page after login
    }

    //function resgister
    public function register()
    {
        return view('Customer.CusRegister');
    }

    public function postCusRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if (cus_account::where('cus_email', $request->email)->exists()) {
            return redirect('/CusRegister')->with('error', 'Email đã tồn tại. Vui lòng chọn một email khác.');
        }

        $data['cus_name'] = $request->name;
        $data['cus_email'] = $request->email;
        $data['cus_password'] = Hash::make($request->password);

        $cus = cus_account::create($data);

        // Log in the user after registration
        //Auth::login($cus);

        return redirect(route(name: 'CusLogin'))->with('ReSuccess', 'Đăng ký thành công! Đăng nhập để vào web');
    }

    function Logout() {
        if (Session::has('LoginID')) {
            Session::pull('LoginID');
            return redirect(route(name:'shop'));
        }
    }
}
 