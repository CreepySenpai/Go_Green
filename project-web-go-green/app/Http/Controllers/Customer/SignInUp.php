<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInUp extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('Customer.sign_in_up');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        
    }

}
