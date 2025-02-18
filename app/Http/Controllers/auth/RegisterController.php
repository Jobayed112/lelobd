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

    public function Register(Request $request)
    {
        try {
            // Validate request data
            $user=$request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|unique:users,email',
                'phone' => 'required|string|max:15|unique:users,phone',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = new User();
            $user->name = $user['name'];
            $user->email=$user['email'];
            $user->phone=$user['phone'];
            $user->password = bcrypt($user['password']);
            $user->save();

            return redirect()->route('login.form')
            ->with('success','User Create Successfully');

        }  catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorized' );
        }
    }
}
