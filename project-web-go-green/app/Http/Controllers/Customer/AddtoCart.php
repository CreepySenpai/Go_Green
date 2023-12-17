<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\cus_account;
use App\Models\temp_cart;
use App\Models\order_detail;
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
      // foreach ($temp_cart as $temp_carts) {
      //   # code...
      //   $totalcart =  $totalcart +  $temp_carts->total_price;
      // }
      return view('Customer.checkout', compact('temp_cart'));
    }

    public function OrderPage() {
      $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
      $id = $info_user->id;

      $order = Cart::where('customer_id', '=', $id)->get();

      return view('Customer.CheckOrder', compact('order'));
    }
    

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
      $cus_id = $info_user->id;
      $temp_carts = temp_cart::where('customer_id', '=', $cus_id)->get();
      $product = Product::find($id);
      
      // Check if the product already exists in the temporary cart
      $existingCartItem = $temp_carts->where('product_id', $id)->first();
      
      if ($existingCartItem) {
          // If the product already exists, increment the quantity
          $existingCartItem->temp_quantity++;
          $existingCartItem->total_price = $product->product_price * $existingCartItem->temp_quantity;
          $existingCartItem->save();
      } else {
          // If the product doesn't exist, create a new entry in the temporary cart
          $temp_cart = new temp_cart;
          $temp_cart->product_title = $product->product_name;
          $temp_cart->price = $product->product_price;
          $temp_cart->image = $product->product_image;
          $temp_cart->temp_quantity = 1;
          $temp_cart->total_price = $product->product_price * $temp_cart->temp_quantity;
          $temp_cart->product_id = $product->product_id;
          $temp_cart->customer_id = $info_user->id;
      
          // Save to the database
          $temp_cart->save();
      }
        return redirect(route(name: 'cart'));
    }

    public function update_temp_cart(Request $request)
    {

      $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
      $id_cus = $info_user->id;
      $temp_cart = temp_cart::where('customer_id', '=', $id_cus)->get();
      
      $productCounts = [];
      
      foreach ($temp_cart as $cartItem) {
          $temp_product_id = $cartItem->product_id;
      
          // Fetch the corresponding product count
          $productCount = Product::where('product_id', '=', $temp_product_id)->first();
      
          // Check if the product count exists before accessing properties
          if (!$productCount) {
              return redirect(route(name: 'cart'))->with('error', 'Không tìm thấy thông tin sản phẩm');
          }
      
          // Check if the requested quantity is valid
          $newQuantity = $request->input('new_quantity');
          if (!$newQuantity || $newQuantity < 1 || $newQuantity > $productCount->product_count) {
              return redirect(route(name: 'cart'))->with('error', 'Số lượng không hợp lệ');
          }
      
          // Store the product count in the array
          $productCounts[$temp_product_id] = $productCount->product_count;
      
          // Update the quantity in the cart item
          $cartItem->temp_quantity = $newQuantity;
      
          // Update the total price in the cart item
          $cartItem->total_price = $newQuantity * $cartItem->price;
      
          // Save the changes to the cart item
          $cartItem->save();
      }
  
        return redirect(route(name: 'cart'));
    }

    public function Remove_temp_cart($id) {
        $temp_cart=temp_cart::find($id);
        $temp_cart->delete();
        return redirect()->back();
    }

    public function add_order(Request $request){
    $uniqid = Str::random(9);
    $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
    $id_cus = $info_user->id;
    $temp_cart = temp_cart::where('customer_id', '=', $id_cus)->get();
    $totalcart = 0;
    foreach($temp_cart as $temp_cart) {
      $totalcart = $totalcart + $temp_cart->total_price;
      $order_detail = new order_detail;
      $order_detail->order_code = $uniqid;
      $order_detail->product_title = $temp_cart->product_title;
      $order_detail->quantity = $temp_cart->temp_quantity;
      $order_detail->total_price = $temp_cart->total_price;
      $order_detail -> save();
    }
    // dd($totalcart);

      $cart = new Cart;
      $cart->name = $request->c_name;
      $cart->address = $request->c_address;
      $cart->phone = $request->c_phone;

      if ($request->c_name === null || $request->c_address === null || $request->c_phone === null) {
          return redirect(route(name:'checkout'))->with('error', 'Vui lòng điền thông tin');
      }

      $cart->customer_email= $info_user->cus_email;
      $cart->order_code=$uniqid;
      $cart->price=$totalcart;
      $cart->customer_id= $id_cus;
      $cart->status_order='Đang xác nhận';

      $cart->save();
      


      $temp_cart = temp_cart::where('customer_id', '=', $id_cus)->delete();

      return redirect(route(name: 'CheckOrder.post'));
    }
    
    public function Remove_cart($id) {
      $cart=Cart::find($id);
      $order_detail = order_detail::where('order_code', '=', $cart->order_code)->delete();
      $cart->delete();
      return redirect()->back();
  }
}
