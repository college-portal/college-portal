<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{

    /**
     * Authenticate User
     * 
     * Uses basic authentication and returns a Json Web Token
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        // set the identifier for wp_users
        JWTAuth::setIdentifier('id');

        try {
            // attempt authorization
            if (! $token = JWTAuth::attempt($credentials, [ 'aud' => 'access' ])) {
                // authorization failed
                return $this->json(['message' => 'invalid credentials'], 400);
            }
            return $this->json(compact('token'));
        }
        catch (\Exception $ex) {
            // authorization error
            return $this->error('could not create token', $ex);
        }
    }

    /**
     * Refresh Access Token
     * 
     * Uses basic authentication and returns a Json Web Token
     */
    public function refresh(Request $request) {
        try {
            if ($request->header('Authorization')) {
                $token = explode(' ', $request->header('Authorization'))[1];
                $refreshed_token = JWTAuth::refresh($token);
                return $this->json([
                    'token' => $refreshed_token
                ]);
            }
            return $this->badRequest('invalid "Authorization" header');
        }
        catch (\Exception $ex) {
            // authorization error
            return $this->error('could not refresh token', $ex);
        }
    }

    /**
     * Get Current User
     * 
     * Retrieve information about the current authenticated user
     */
    public function current(Request $request) {
        return $request->user();
    }
}
