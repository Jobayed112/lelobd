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

        return view('pages.home');
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









