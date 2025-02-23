<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
  public function orderList() {


    $orders=Order::with('products')->paginate(20);

    return view('pages.admin.order.order_list',compact('orders'));

  }
}
