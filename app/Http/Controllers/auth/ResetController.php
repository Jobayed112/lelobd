<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetController extends Controller
{
    public function resetForm()
    {
        return view('pages.auth.reset-form');
    }
    public function reset(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            if (!$user) {
                return back()->withErrors(['email' => 'Email not found']);
            }
        $otp = rand(100000, 999999);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $otp,
                'created_at' => now()
            ]
        );
        Mail::to($email)->send(new OTPMail($otp));

        $request->session()->put('email', $email);
        return redirect()->route('OTP-form')->with('status', 'OTP sent to your email!');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Reset Failed',
                'message' => $e->getMessage()
            ], 400);
        }


    }

    public function otpform()
    {
        return view('pages.auth.OTP-form');
    }
    public function verifyOtp(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|numeric|digits:6',
            ]);

            $email = $request->session()->get('email');
            $otp = $request->input('otp');

            $tokenData = DB::table('password_reset_tokens')->where('email', $email)->first();

            if (!$tokenData) {
                return back()->withErrors(['otp' => 'No OTP found for this email.']);
            }

            if ($tokenData->token !== $otp) {
                return back()->withErrors(['otp' => 'Invalid OTP entered.']);
            }
            $createdAt = $tokenData->created_at;
            $expiryTime = 10; // OTP expiry in minutes
            $currentTime = now();
            if ($currentTime->diffInMinutes($createdAt) > $expiryTime) {
                return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
            }

            return redirect()->route('reset-password-form')->with('status', 'OTP verified successfully. Please reset your password.');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'OTP verification failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function resetPasswordForm()
    {
        return view('pages.auth.reset-password-form');
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|string|min:8|confirmed', // Password must match the confirmation
            ]);

            $email = $request->session()->get('email');
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->route('login-form')->withErrors(['email' => 'Email not found']);
            }

            $user->password = Hash::make($request->input('password')); // Hash the password before saving
            $user->save();

            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return redirect()->route('login-form')->with('status', 'Password reset successfully. Please login.');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Password reset failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
