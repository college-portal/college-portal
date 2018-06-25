<?php namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;
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
                \JWTAuth::parseToken()->authenticate();
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
