<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\cus_account;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;



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
        // return view('Customer.shop', compact('info_user'));
    }

    public function filterByCategory($cate_slug)
    {
        $data['cate'] = Category::all();
        // Find the category by slug
        $category = Category::where('cate_slug', $cate_slug)->firstOrFail();
        $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
        // Get products belonging to the category
        $products = Product::where('product_type', $category->cate_id)->paginate(2);

        // Pass data to the view
        return view('Customer.shoplist', $data ,compact('products', 'category', 'info_user'));
    }

    public function product_details($product_id) {
        $product = Product::where('product_id', $product_id)->firstOrFail();
        
        // Check if the product is found before trying to paginate comments
        if ($product) {
            $cmt = Comment::where('com_product', $product_id)->orderBy('updated_at', 'desc')->paginate(5);
            return view('Customer.product_details', compact('product', 'cmt'));
        } else {
            // Handle the case where the product is not found
            return abort(404);
        }
    }

    public function product_cmt(Request $request, $product_id) {
       
        $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();

        $new_cmt = new Comment();
        $new_cmt->com_email = $info_user->cus_email;
        $new_cmt->com_name = $info_user->cus_name;
        $new_cmt->com_content = $request->cmt_area;

        if($request->cmt_area === null) {
            return redirect()->back()->with('error', 'Vui lòng nhập bình luận');
        }

        $new_cmt->com_product = $product_id;
        $new_cmt->save();

        return redirect()->back();
    }       

//     public function show_cmt($product_id){
//         return view('Customer.product_details', compact('cmt')); 
//     }
}
