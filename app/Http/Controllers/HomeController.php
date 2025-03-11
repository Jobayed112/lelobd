<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $productOffers=ProductOffer::with('product.images')->get();

        return view('pages.home',compact('productOffers'));
    }
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.form');
        } elseif (Auth::check()) {

            $email = Auth::user()->email;
            $user = User::where('email', $email)->first();
            $orders=$user->orders;
            $invoices=Invoice::where('user_id',$user->id)->get();
            return view('pages.user.profile',compact('orders','invoices'));

        }

    }

    public function userorderDelete($id)
    {
        $order = Order::findOrFail($id);

        if ($order->invoice()->exists()) {
            return redirect()->route('home')->with('error', 'Order cannot be deleted because an invoice has already been created.');
        }
        $order->orderItems()->delete();

        $order->delete();

        return redirect()->route('profile')->with('success', 'Order deleted successfully!');
    }

}









