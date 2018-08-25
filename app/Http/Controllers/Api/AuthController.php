<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use App\Services\UserService;
use App\Filters\UserFilters;

class AuthController extends ApiController
{
    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Authenticate User
     * 
     * Uses basic authentication and returns a Json Web Token
     */
    public function login(Request $request, UserFilters $filters) {
        $credentials = $request->only('email', 'password');

        // set the identifier for wp_users
        JWTAuth::setIdentifier('id');

        try {
            // attempt authorization
            if (! $token = JWTAuth::attempt($credentials, [ 'aud' => 'access' ])) {
                // authorization failed
                return $this->json(['message' => 'invalid credentials'], 400);
            }
            // make sure the user's email is verified
            $user = $this->service()->repo()->userByEmail($credentials['email'], $filters->add('email_verified'));
            if (!$user) {
                $user = $this->service()->repo()->userByEmail($credentials['email']);
                $payload = JWTFactory::sub($user->id)->aud('email-verification')->make();
                return $this->json([
                    'message' => 'user email not verified',
                    'token' => JWTAuth::encode($payload)->get()
                ], 403);
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

    /**
     * Resent Verification Mail
     * 
     * Accept email-verification token and resend mail if valid
     */
    public function resendVerificationMail(Request $request) {
        if ($request->header('Authorization')) {
            try {
                $payload = null;
                $user = null;
                if (auth()->user()) { // when request is made via test
                    $token = explode(' ', $request->header('Authorization'))[1];
                    $jwt_auth = \JWTAuth::setToken($token);
                    $payload = $jwt_auth->getPayload();
                    $user = $jwt_auth->authenticate($token);
                }
                else {
                    $jwt_auth = \JWTAuth::parseToken();
                    $payload = $jwt_auth->getPayload();
                    $user = $jwt_auth->authenticate();
                    // make sure the token's aud is "email-verification"
                    if ($payload->get('aud') !== 'email-verification') {
                        throw new TokenInvalidException();
                    }
                }
                $this->service->sendVerificationMail($user);
                return response()->json([
                    'message' => 'verification mail sent'
                ]);
            } catch (TokenExpiredException $e) {
                return response()->json([ 'message' => 'token expired' ], $e->getStatusCode());
            } catch (TokenInvalidException $e) {
                return response()->json([ 'message' => 'token invalid' ], $e->getStatusCode());
            } catch (JWTException $e) {
                return response()->json([ 'message' => 'token absent' ], $e->getStatusCode());
            }
        }
        return response()->json([
            'message' => 'no "Authorization" header found'
        ], 400);
    }
}
