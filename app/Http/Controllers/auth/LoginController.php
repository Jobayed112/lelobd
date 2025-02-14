<?php

namespace App\Http\Controllers\auth;

use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('pages.auth.login-form');
    }
    public function create(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:6',

            ]);

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return redirect()->back()->withInput()->withErrors([
                    'email' => 'Email not match.',
                    'password' => 'password not match'
                ]);
                # code...
            }
            $token = JWTToken::CreateToken('email');
            return redirect()->back()->with(
                  'success', 'User Login Successful',
           )
            ->cookie('token', $token, time() + 60 * 24 * 30);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Login failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }




}
