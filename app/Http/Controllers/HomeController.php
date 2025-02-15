<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $products=Product::with('category')->paginate(10);
        $categories = Category::with('subcategories')->paginate(8);
        return view('pages.home',compact('categories','products'));
    }
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login-form');
        } elseif (Auth::check()) {
            return view('pages.profile');
        }

    }
}









