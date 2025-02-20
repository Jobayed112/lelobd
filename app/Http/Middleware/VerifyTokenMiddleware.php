<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyTokenMiddleware
{
    public function handle(Request $request, Closure $next ): Response
{
    try {
        $token = $request->cookie('token');
        $result = JWTToken::ReadToken($token);

        if ($result === "unauthorized") {
            return redirect()->route('login.form')->with('error', 'Your Token Not Found');
        }
           $request->headers->set('user_email' ,$result->user_email);
           $request->headers->set('user_id' ,$result->user_id);
           return $next($request);

    } catch (\Exception $e) {
        return redirect()->route('login.form')->with('error', 'Invalid token data');
    }




}
}
