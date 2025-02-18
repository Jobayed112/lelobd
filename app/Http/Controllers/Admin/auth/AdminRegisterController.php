<?php

namespace App\Http\Controllers\Admin\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function adminRegisterForm()
    {
        return view('pages.admin.auth.register-form');
    }
    public function adminregister(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|unique:users,email',
                'phone' => 'required|string|max:15|unique:users,phone',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:admin,user',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email =  $request->input('email');

            $user->phone =  $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role');


            $user->save();
            return redirect()->route('admin-login-form')
                ->with('success', 'Admin Created Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Email or Phone Allrady Token');
        }
    }
}
