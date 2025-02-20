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
            $JWT_KEY = "base64:ud+9cshYJfN5RyI4TDPJLn+a5b0pZ7yYm0oVgqrnQMk=";
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
            $JWT_KEY = "base64:ud+9cshYJfN5RyI4TDPJLn+a5b0pZ7yYm0oVgqrnQMk=";
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
            $JWT_KEY = "base64:ud+9cshYJfN5RyI4TDPJLn+a5b0pZ7yYm0oVgqrnQMk=";

            if (!$JWT_KEY || !is_string($JWT_KEY)) {
                return back()->back('error','key is not found');
            }
           return JWT::decode($token, new Key($JWT_KEY, 'HS256'));


        } catch (\Exception $e) {
            return "unauthorized";
        }
    }

}
