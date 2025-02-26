<?php

namespace App\Http\Controllers;

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
            return view('pages.user.profile');
        }

    }
}









