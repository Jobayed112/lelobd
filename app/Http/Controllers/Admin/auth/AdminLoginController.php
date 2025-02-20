<?php

namespace App\Http\Controllers\Admin\auth;


use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function adminLoginForm()
    {
        return view('pages.admin.auth.login-form');
    }

    public function adminCreate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);
            $user = User::where('email', "=", $request->email)->first();

            if (!$user) {
                return back()->with('error', 'User not found');
            }

            if (Hash::check($request->password, $user->password ) && $user->role==='admin') {

                $token = JWTToken::CreateToken($user->email, $user->id);
                // dd($token);

                return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successful')
                    ->cookie('token', $token, time() + 60 * 24 * 30);
            } else {
                return back()->with('error', 'Invalid Email or Password');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Unauthorized');
        }
    }
}
