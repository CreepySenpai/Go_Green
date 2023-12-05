<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){
        return view('Admin.backend.index');
    }

    public function getLogOut(){
        Auth::logout();
        return redirect('/login');
    }
}
