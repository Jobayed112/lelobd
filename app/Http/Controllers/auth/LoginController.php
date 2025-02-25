<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()

    {

        return view('pages.auth.login-form');
    }

    public function loginCreate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:6',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'User not found');
            }

            if (Hash::check($request->password, $user->password))
             {

                Auth::login($user);
                $token = JWTToken::CreateToken($user->email, $user->id);
                return redirect()->route('home')->with('success', 'Login Successful')
                    ->cookie('token', $token, 60 * 24 * 30);
            } else {
                return back()->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Unauthorized');
        }
    }
}
