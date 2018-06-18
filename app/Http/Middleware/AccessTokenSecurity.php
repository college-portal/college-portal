<?php namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
            \JWTAuth::parseToken()->authenticate();
            return $next($request);
        }
        return response()->json([
            'message' => 'no "Authorization" header found'
        ], 400);
    }
}
