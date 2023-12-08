<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){
        $data['commentList'] = Comment::orderBy('updated_at', 'desc')->get();
        $data['userCount'] = User::all()->count();
        $data['productCount'] = Product::all()->count();
        $data['categoryCount'] = Category::all()->count();
        $data['commentCount'] = Comment::all()->count();
        return view('Admin.backend.index', $data);
    }

    public function getLogOut(){
        Auth::logout();
        return redirect('/login');
    }
}
