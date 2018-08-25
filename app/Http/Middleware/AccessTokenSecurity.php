<?php namespace App\Http\Middleware;

use CollegePortal\Models\User;
use Auth;
use Closure;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

/**
 * makes sure the "Authorization" header is present
 * and that it contains a valid JWT token
 */

class AccessTokenSecurity
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next) {
        if ($request->header('Authorization')) {
            try {
                $payload = null;
                if ($this->auth->user()) { // when request is made via test
                    $token = explode(' ', $request->header('Authorization'))[1];
                    $jwt_auth = \JWTAuth::setToken($token);
                    $payload = $jwt_auth->getPayload();
                    $jwt_auth->authenticate($token);
                }
                else {
                    $jwt_auth = \JWTAuth::parseToken();
                    $payload = $jwt_auth->getPayload();
                    $jwt_auth->authenticate();
                    // make sure the token's aud is "access"
                    if ($payload->get('aud') !== UserService::AUD_ACCESS) {
                        throw new TokenInvalidException();
                    }
                }
                return $next($request);
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
