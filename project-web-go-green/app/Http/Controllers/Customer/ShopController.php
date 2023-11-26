<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\cus_account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class ShopController extends Controller
{
    public function getData(){
        $data['products'] = Product::paginate(8);
        $data['cate'] = Category::all();
        $info_user = array();
        if (Session::has('LoginID')) {
            # code...
            $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();

        }

        return view('Customer.shop', $data, compact('info_user'));
        return view('Customer.product_details', $data);
        // return view('Customer.shop', compact('info_user'));
    }

    public function product_details($product_slug) {
        $product = Product::where('product_slug', $product_slug)->firstOrFail();
        return view('Customer.product_details', compact('product'));
    }
}
