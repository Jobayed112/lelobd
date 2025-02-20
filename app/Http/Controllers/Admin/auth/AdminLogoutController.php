<?php

namespace App\Http\Controllers\Admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login.form')->with('success' ,'Logout successful' )->cookie('token',' ',-1);
        } catch (\Exception $e) {
            return  back()->with('error' ,'Unauthorized' );
        }
    }
}
