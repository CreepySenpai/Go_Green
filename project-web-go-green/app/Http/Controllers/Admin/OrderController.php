<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $data['orderList'] = Cart::all();
        return view('Admin.backend.order', $data);
    }

    public function getDeleteOrder($order_id){
        Cart::destroy($order_id);
        return redirect()->back()->with(['delete_order_success' => 'Xoá Đơn Hàng Thành Công!!!']);
    }
}
