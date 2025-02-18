<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    /**
     * Create a new JWT token.
     *
     * @param string $email
     * @return string
     */
    public static function CreateToken(string $user_email ,$user_id ): string
    {
        try {
            $JWT_KEY = env('JWT_KEY');
            $payload = [
                'iss' => 'www.lelobd.com',
                'iat' => time(),
                'exp' => time() + 60 * 60,
                'user_email' => $user_email,
                'user_id' => $user_id,
            ];
            return JWT::encode($payload, $JWT_KEY, 'HS256');
        } catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorized' );
        };


    }

    public static function VerifyToken(string $token): mixed
    {
        try {
            $JWT_KEY = env('JWT_KEY');
            $decoded = JWT::decode($token, new Key($JWT_KEY, 'HS256'));
            return $decoded;
        } catch (\Exception $e) {
            return back()->with(
                'error' ,'unauthorized' );
        };
    }


    public static function ReadToken($token): string|object
    {
        try {
            if ($token === null) {
                return "unauthorized";
            }

            $key = env('JWT_KEY');
            return JWT::decode($token, new Key($key, 'HS256'));

        } catch (\Exception $e) {
            return "unauthorized";
        }
    }

}
