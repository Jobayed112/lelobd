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
    public static function CreateToken(string $email): string
    {
        $JWT_KEY = env('JWT_KEY');
        $payload = [
            'iss' => 'www.lelobd.com',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'email' => $email,
        ];
        return JWT::encode($payload, $JWT_KEY, 'HS256');
    }
    /**
     * Verify a JWT token and return the email.
     *
     * @param string $token
     * @return mixed
     */
    public static function VerifyToken(string $token): mixed
    {
        try {
            $JWT_KEY = env('JWT_KEY');
            $decoded = JWT::decode($token, new Key($JWT_KEY, 'HS256'));
            return $decoded->email;
        } catch (\Exception $e) {
            return logger($e->getMessage());
        }
    }
}
