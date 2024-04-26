<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.modules.order.index',compact('orders'));
    }
    public function details($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.modules.order.details',compact('order'));
    }
    public function status_change($id,Request $request)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with(['message' => 'order Status Changed!']);
    }
}
