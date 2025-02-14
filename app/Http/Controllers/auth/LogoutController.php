<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('login-form')->with('success' ,'Logout successful' )->cookie('token',' ',-1);
        } catch (\Exception $e) {
            return  back()->with('error' ,'unathorize' );
        }
    }
}
