<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        // Get all orders
        $data['orderList'] = Cart::all();

        // Initialize an empty array to store all order details
        $details=[];
        // Loop through each order
        foreach ($data['orderList'] as $order) {
         // Get details for each order
            $code = $order->order_code;
            $details[$code] = order_detail::where('order_code', $code)->get();
        }

    // Pass both order list and order details to the view
    return view('Admin.backend.order', $data ,compact('details'));
    }
    public function getDeleteOrder($order_id){
        Cart::destroy($order_id);
        return redirect()->back()->with(['delete_order_success' => 'Xoá Đơn Hàng Thành Công!!!']);
    }

    public function getDeliveryOrder($order_id){

        $order = Cart::find($order_id);
        $order->status_order = 'Đang giao hàng';
        $order->save();
        
        $order_detail = order_detail::where('order_code', '=', $order->order_code)->get();

        foreach ($order_detail as $order_details) {
            // Find the product
            $product = Product::find($order_details->product_id);
    
            // Update product count
            $product->product_count -= $order_details->quantity;
    
            // Save the updated product count
            $product->save();
        }
        dd($product);

        return redirect()->back()->with(['delete_order_success' => 'Xoá Đơn Hàng Thành Công!!!']);
    }
}
