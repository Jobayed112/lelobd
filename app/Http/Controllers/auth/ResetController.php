<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetController extends Controller
{
    public function resetForm()
    {
        return view('pages.auth.reset-form');
    }
    public function userReset(Request $request)
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

            $user->otp=$otp;
            $user->save();
        $request->session()->put('email', $email);
        return redirect()->route('otp.form')->with('status', 'OTP sent to your email!');

        }  catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorized' );
        }



    }

    public function otpForm()
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

            $user=User::where('email',$tokenData->email)->first();

            if (!$user) {
                return back()->with('error', ' OTP or email not found');
            }


            if (!$tokenData) {
                return back()->with('error', 'No OTP found for this email.');
            }

            if ($tokenData->token !== $otp) {
                return back()->with('error' , 'Invalid OTP entered.');
            }

            $createdAt = $tokenData->created_at;
            $expiryTime = 10; // OTP expiry in minutes
            $currentTime = now();
            if ($currentTime->diffInMinutes($createdAt) > $expiryTime) {
                return back()->with( 'error' , 'OTP has expired. Please request a new one.');
            }

            return redirect()->route('reset.pass.form')->with('status', 'OTP verified successfully. Please reset your password.');

        }  catch (\Exception $e) {
            return back()->with('error','unauthorized'
                 );
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
                'password' => 'required|string|min:8|confirmed',
            ]);

            $email = $request->session()->get('email');
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->route('login.form')->with('email' , 'Email not found');
            }

            $user->password = Hash::make($request->input('password'));



            DB::table('password_reset_tokens')->where('email', $email)->delete();

            $user->otp=null;

            $user->save();


            return redirect()->route('login.form')->with('status', 'Password reset successfully. Please login.');

        } catch (\Exception $e) {
            return back()->with('error','Password reset failed' );
        }
    }

    // user update name email and phone number

    public function userProfileUpdate(Request $request) {

       $userEmail= $request->header('user_email');
         $user=User::where('email',$userEmail)->first();
        if($user){
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->phone=$request->input('phone');
            $user->save();
            return back()->with('message', 'User updated successfully' );
           }
              else{
                return back()->with('error', 'User not found' );
              }
    }
    public function userPasswordChange (Request $request)  {
        $userEmail= $request->header('user_email');
        $user=User::where('email',$userEmail)->first();

        if($user && Hash::check($request->input('current-password'), $user->password) && $request->input('new-password')==$request->input('confirm-password')){
            $user->password=Hash::make($request->input('new-password'));
            $user->save();
            return back()->with('message', 'Password updated successfully' );
        }
        else{
            return back()->with('error', 'Password not matched' );
        }


    }


}
