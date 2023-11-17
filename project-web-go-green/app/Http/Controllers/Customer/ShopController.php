<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getData(){
        $data['products'] = Product::paginate(8);
        $data['cate'] = Category::all();
        return view('Customer.shop', $data);
        return view('Customer.product_details', $data);
    }

    public function product_details($product_slug) {
        $product = Product::where('product_slug', $product_slug)->firstOrFail();
        return view('Customer.product_details', compact('product'));
    }
}
