<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdatedPasswordController extends Controller
{
    public function updateform()
    {
        return view('pages.auth.updated-form');
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'current_password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            $user = $request->user();

            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return response()->json(['error' => 'Current password is incorrect'], 400);
            }

            $user->update([
                'password' => Hash::make($validatedData['new_password']),
            ]);

            return response()->json(['message' => 'Password updated successfully'], 200);
        }  catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorize' );
        }
    }
}
