<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdatedPasswordController extends Controller
{
    public function resetPasswordForm()
    {
        return view('pages.auth.reset-form');
    }

    public function resetPassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'current_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            $user = $request->user();

            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return back()->with('error' ,'Current password is incorrect');
            }

            $user->update([
                'password' => Hash::make($validatedData['new_password']),
            ]);

            return back()->with('message' , 'Password updated successfully');
        }  catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorize' );
        }
    }
}
