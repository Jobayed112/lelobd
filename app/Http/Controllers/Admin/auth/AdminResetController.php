<?php

namespace App\Http\Controllers\Admin\auth;

use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminResetController extends Controller
{
    public function adminResetForm()
{
        return view('pages.admin.auth.reset-form');
}
    public function adminreset(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'Email not found');
        }
        $otp = rand(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            [
                'email' => $email,
                'token' => $otp,
                'created_at' => now(),
            ],
        );
        Mail::to($email)->send(new OTPMail($otp));

        $request->session()->put('email', $email);

        return redirect()->route('admin.OTP.form')->with('status', 'OTP sent to your email!');

        } catch (\Exception $e) {
            return back()->with(
                'error','Unauthorized'
            );
        }
    }



    public function adminotpform()
{
        return view('pages.admin.auth.OTP-form');
}
    public function adminverifyOtp(Request $request)
{
    try {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $email = $request->session()->get('email');
        $otp = $request->input('otp');

        $tokenData = DB::table('password_reset_tokens',)->where('email', $email)->first();

        if (!$tokenData) {
            return back()->withErrors(['error' => 'No OTP found for this email.']);
        }

        if ($tokenData->token !== $otp) {
            return back()->with('error','Invalid OTP entered.');
        }
        $createdAt = $tokenData->created_at;
        $expiryTime = 10;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdAt) > $expiryTime) {
            return back()->with('error', 'OTP has expired. Please request a new one.');
        }

        return redirect()->route('admin.reset.password.form')->with('status', 'OTP verified successfully. Please reset your password.');
    } catch (\Exception $e) {
        return back()->with('error','Unauthorized'

        );
    }

}

    public function adminresetPasswordForm()
    {
        return view('pages.admin.auth.reset-password-form');
    }

    public function adminResetPassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);


            $email = $request->session()->get('email');
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->route('admin.login.form')->with('email', 'Email not found');
            }

            $user->password = Hash::make($request->input('password'));
            $user->save();

            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return redirect()->route('admin.login.form')->with('status', 'Password reset successfully. Please login.');

        } catch (\Exception $e) {
            return back()->with('error','password is not match'

            );
        }

    }
}
