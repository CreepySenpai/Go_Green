<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showProducts() {
        $products = Product::all();
        return view('Customer.shop', ['products'=>$products]);
    }

    public function showCategorys() {
        $categorys = Category::all();
        return view('Customer.shop', ['categorys'=>$categorys]);
    }

}
