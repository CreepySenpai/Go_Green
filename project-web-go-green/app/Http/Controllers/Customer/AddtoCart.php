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
        $temp_cart->temp_quantity=1;
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
        // $info_user = cus_account::where('id', '=', Session::get('LoginID'))->first();
        // $id_cus = $info_user->id;
        // $temp_cart = temp_cart::where('customer_id', '=',$id_cus)->get();

        // $productCounts = [];

        // foreach ($temp_cart as $cartItem) {

        //   $temp_product_id = $cartItem->product_id;
        //   $temp_cart_items= $cartItem->where('id', '=', $cartItem->id)->first();
  
        //   // Count the number of products for each product ID
        //   $productCount = Product::where('product_id', '=', $temp_product_id)->first();
        // //   dd($productCount);
  
        //   // Store the product count in the array
        //   $productCounts[$temp_product_id] = $productCount->product_count;

        //   $cartItem->temp_quantity = $request->new_quantity;
        //   if ($request->new_quantity < $productCounts[$temp_product_id] || $request->new_quantity === 0) {
        //       return redirect(route(name: 'cart'))->with('error', 'Số lượng không hợp lệ');
        //   }

        //   $cartItem->total_price = $request->new_quantity*$temp_cart_items->price;

        //   $cartItem->save();
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
    
            // Store the product count in the array
            $productCounts[$temp_product_id] = $productCount->product_count;
    
            // Fetch the specific cart item using its ID
            $temp_cart_item = temp_cart::find($cartItem->id);
    
            // Update the quantity in the cart item
            $temp_cart_item->temp_quantity = $request->new_quantity;
    
            // Check if the new quantity is valid
            if ($request->new_quantity < 1 || $request->new_quantity > $productCounts[$temp_product_id]) {
                return redirect(route(name: 'cart'))->with('error', 'Số lượng không hợp lệ');
            }
    
            // Update the total price in the cart item
            $temp_cart_item->total_price = $request->new_quantity * $temp_cart_item->price;
    
            // Save the changes to the cart item
            $temp_cart_item->save();
        }
    
        // Additional logic or redirection if needed
    
        // Redirect to the cart page after updating items
        return redirect(route(name: 'cart'));
      }

    //     return redirect(route(name: 'cart'));
    // }



    public function Remove_temp_cart($id) {
        $temp_cart=temp_cart::find($id);
        $temp_cart->delete();
        return redirect()->back();
    }


}
