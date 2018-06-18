<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends ApiController
{

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        // set the identifier for wp_users
        \JWTAuth::setIdentifier('id');

        try {
            // attempt authorization
            if (! $token = \JWTAuth::attempt($credentials)) {
                // authorization failed
                return $this->json(['error' => 'invalid_credentials'], 400);
            }
            return $this->json(compact('token'));
        }
        catch (JWTException $ex) {
            // authorization error
            return $this->error('could_not_create_token', $ex);
        }
    }

    public function current(Request $request) {
        return $request->user();
    }
}
