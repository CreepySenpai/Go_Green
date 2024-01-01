<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order_detail;
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
    // public function getDeliveryOrder($id){
    //     $order = Cart::find($id);
    //     $order->status_order = 'Đang giao hàng';
    //     $order->save();
    //     return redirect()->back()->with(['delivery_order_success' => 'Đã giao cho bên giao hàng Thành Công!!!']);
    // }
}
