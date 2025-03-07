<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $user = User::first();

        if (!$user) {
            return redirect()->route('admin.login.form');
        }

        if ($user->role !== 'admin') {
            return redirect()->route('admin.login.form');
        }

        return $next($request);
    }
}
