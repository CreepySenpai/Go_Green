<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $loginValue = ['email' => $request->input('email'), 'password' => $request->input('password')];
        if($request->input('remember') == "Remember Me"){
            $remember = true;
        }
        else{
            $remember = false;
        }

        if(Auth::attempt($loginValue, $remember)){
            return redirect()->intended('admin/home');
        }
        else{
            return back()->withInput()->with('error', "Tài Khoản Hoặc Mật Khẩu Không Đúng!!!");
        }
    }
}
