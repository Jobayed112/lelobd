<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('pages.auth.register-form');

    }

    public function register(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|unique:users,email',
                'phone' => 'required|string|max:15|unique:users,phone',
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Create a new user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'user',
            ]);
            if ($user) {
                // Successful response
                return redirect()->route('login-form')
                    ->withErrors([
                        'message' => 'User registered successfully',
                    ], 201);
            }
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Email not match.',
                'password' => 'password not match',
                'phone' => 'password not match'
            ]);


        } catch (\Exception $e) {
            // Handle other errors
            return response()->json([
                'error' => 'Registration Failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
