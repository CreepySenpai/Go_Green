<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getProduct(){
        $data['products'] = Product::all();
        $data['cate'] = Category::all();
        return view('Customer.shop', $data);
    }
}
