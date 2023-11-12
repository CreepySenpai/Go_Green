<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\vp_product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $products = vp_product::all();
        return view('front.shop', ['products'=>$products]);
    }
}
