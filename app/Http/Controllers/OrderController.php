<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order()
    {
        $orders=Order::latest()->get();
        // ->paginate(3);
        $total_order=Order::count();
        return view('admin.order.manage',compact('orders','total_order'));
    }

    public function view_order($id)
    {
        $orders=Order::where('orders.id',$id)->first();
        $order_by_id=OrderDetail::where('order_id',$id)->get();
        return view('admin.order.view',compact('orders','order_by_id'));
    }
}
