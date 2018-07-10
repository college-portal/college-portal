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
            if (! $token = JWTAuth::attempt($credentials)) {
                // authorization failed
                return $this->json(['message' => 'invalid credentials'], 400);
            }
            return $this->json(compact('token'));
        }
        catch (\Exception $ex) {
            // authorization error
            return $this->error('could_not_create_token', $ex);
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
