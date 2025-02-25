<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function orderList()
    {


        $orders = Order::all();

        return view('pages.admin.order.order_list', compact('orders'));
    }

    public function orderedit($id) {

        $order = Order::findOrFail($id);
        return view('pages.admin.order.order_update',compact('order'));

    }

    public function orderUpdate(Request $request,$id)
    {
            $request->validate([
                'status' => 'required|string|max:255',
                'total_amount' => 'required|numeric|min:0',
                'shipping_address' => 'required|string|max:255',
            ]);
            $order = Order::findOrFail($id);

          $order->update([
                'status' => $request->status,
                'total_amount' => $request->total_amount,
                'shipping_address' => $request->shipping_address,
            ]);


            return redirect()->route('order.list')->with('success', 'Order updated successfully!');

    }
}
