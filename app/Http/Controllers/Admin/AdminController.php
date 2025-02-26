<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

public function adminDashboard() {
    $products = Product::all();
    $categories = Category::with('subcategories')->get();

    $invoices = Invoice::all();
    $users= User::all();
    $productdetails=ProductDetail::with('product')->get();
    $orders=Order::all();
    $offers=ProductOffer::all();
    return view('pages.admin.home.summary',compact('products','categories','invoices','users','productdetails','orders','offers'));
}
public function admin()
{
    try {
        $user = Auth::user();


        if (!$user) {
            return redirect()->route('admin-login-form');
        }elseif ($user->role == 'admin') {
            // Show admin dashboard

            return redirect()->route('admin-dashboard');
        }
        return back()->with(
            'error' ,'Your Role Is Not Match' );


    } catch (\Exception $e) {
        return back()->with(
            'error' ,'unauthorize' );
    }
}

}
