<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\cus_account;
use App\Models\temp_cart;
use PhpParser\Node\Stmt\For_;

class AddtoCart extends Controller
{
    public function showPage() {

        $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
        $id = $info_user->id;
        // dd($id);
        $temp_cart=temp_cart::where('customer_id', '=',$id)->get();
         // Initialize an array to store product counts
        $productCounts = [];

          // Loop through each temp_cart record to fetch product information
        foreach ($temp_cart as $cartItem) {
          $temp_product_id = $cartItem->product_id;
  
          // Count the number of products for each product ID
          $productCount = Product::where('product_id', '=', $temp_product_id)->first();
        //   dd($productCount);
  
          // Store the product count in the array
          $productCounts[$temp_product_id] = $productCount->product_count;
        //   dd($productCounts[$temp_product_id]);
      }

        return view('Customer.Cart', compact('temp_cart', 'productCounts'));
       
    }

    public function checkoutPage() {
      $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
      $id = $info_user->id;
      $temp_cart=temp_cart::where('customer_id', '=',$id)->get();
      $totalcart = 0;

      // foreach ($temp_cart as $temp_carts) {
      //   # code...
      //   $totalcart =  $totalcart +  $temp_carts->total_price;
      // }
      return view('Customer.checkout', compact('temp_cart', 'totalcart'));
    }



      
    // }

    // public function add_cart(Request $request, $id) {

    //     $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();

    //     // dd($info_user);
    //     $product=Product::find($id);
    //     // dd($product);
    //     $cart = new cart;
    //     $cart->customer_email=$info_user->cus_email;
    //     $cart->customer_id=$info_user->id;
    //     $cart->product_id=$product->product_id;
    //     $cart->product_title=$product->product_name;
    //     $cart->price=$product->product_price;
    //     $cart->image=$product->product_image;
        
    //     $cart->save();
    //     //return view('Customer.Cart');
    // }

    public function add_temp_cart(Request $request, $id) {

        $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
        //dd($info_cus);
        $product=Product::find($id);

        $temp_cart = new temp_cart;
        $temp_cart->product_title=$product->product_name;
        $temp_cart->price=$product->product_price;
        $temp_cart->image=$product->product_image;
        $temp_cart->temp_quantity=$request->quantiny;
        // dd($temp_cart->temp_quantity);
        $temp_cart->total_price=$product->product_price * $temp_cart->temp_quantity;
        // $temp_cart->total_price=$product->
        $temp_cart->product_id=$product->product_id;
        $temp_cart->customer_id=$info_user->id;


        //save db
        $temp_cart->save();

        return redirect(route(name: 'cart'));
    }

    public function update_temp_cart(Request $request)
    {

        // $test = $request->new_quantity;
        // dd($test);
        $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
        $id_cus = $info_user->id;
        $temp_cart = temp_cart::where('customer_id', '=',$id_cus)->get();

        foreach ($temp_cart as $cartItem) {

          $temp_cart_items= $cartItem->where('id', '=', $cartItem->id)->first();

          $cartItem->temp_quantity = $request->new_quantity;
          $cartItem->total_price = $request->new_quantity*$temp_cart_items->price;

          $cartItem->save();
        }

        return redirect(route(name: 'cart'));
    }



    public function Remove_temp_cart($id) {
        $temp_cart=temp_cart::find($id);
        $temp_cart->delete();
        return redirect()->back();
    }


}
