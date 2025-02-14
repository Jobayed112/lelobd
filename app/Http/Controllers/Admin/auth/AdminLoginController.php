<?php
namespace App\Http\Controllers\Admin\auth;


use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function adminLoginForm()
    {
        return view('pages.admin.auth.login-form');
    }

    public function adminCreate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);
            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return redirect()->back()->with('error', 'Invalid email or password.');
            } elseif (Auth::user()->role !== 'admin') {
                Auth::logout();
                return redirect()->back()->with('error', 'Unauthorized access. Only admins can log in.');
            }
            $token = JWTToken::CreateToken(Auth::user()->email);

            return redirect()->route('admin-dashboard')->with('success', 'Admin Login successfully!')
                ->cookie('token', $token, 60 * 24 * 30);
        } catch (\Exception $e) {
            return response()->json([
                'failed' => 'Login failed',
            ], 400);
        }
    }

}
