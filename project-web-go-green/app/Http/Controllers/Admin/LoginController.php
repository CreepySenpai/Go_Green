<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('Admin.backend.login2');
    }

    public function postLogin(LoginRequest $request){

        $remember = false;
        if($request->remember == "remember"){
            $remember = true;
        }
        $loginValue = ['email' => $request->email, 'password' => $request->password];

        if(Auth::attempt($loginValue, $remember)){
            return redirect('/admin/home');
        }
        else{
            return back()->withInput()->with('error', "Tài Khoản Hoặc Mật Khẩu Không Đúng!!!");
        }

    }
}
