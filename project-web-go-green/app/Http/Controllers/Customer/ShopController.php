<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $product = ProductModel::all();
        return view('front.shop', compact('product'));
    }
}
