<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('Admin.backend.register');
    }

    public function postRegister(RegisterRequest $request){
        $newUser = new User();
        $newUser->user_name = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->role_type = 2;

        $status = $newUser->save();

        if($status == true){
            return redirect()->back()->with('success_status', 'Tạo Tài Khoản Thành Công!!!');
        }
        else{
            return redirect()->back()->with('error_status', 'Tạo Tài Khoản Thất Bại! Vui Lòng Sử Dụng Email Khác!!');
        }
    }
}
