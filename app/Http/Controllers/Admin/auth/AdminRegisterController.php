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
            // Validate request data
         $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|unique:users,email',
                'phone' => 'required|string|max:15|unique:users,phone',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create a new user
            $user = new User();
           $user->name=$request->name;
           $user->email=$request->email;
           $user->phone=$request->phone;
           $user->password = bcrypt($request->password);
            $user->role=$request->role;

           $user->save();

            return redirect()->route('admin-login-form')
            ->with('success','Admin Create Successfully');

        } catch (\Exception $e) {
            return response()->json([
                'faild' => 'Registration Failed',
            ], 500);
        }
    }


}
