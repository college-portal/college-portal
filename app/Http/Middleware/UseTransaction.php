<?php namespace App\Http\Middleware;

use CollegePortal\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;

/**
 * makes sure the "db" header is present, and 
 * that it contains "transaction" as its value
 */

class UseTransaction
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next) {
        if ($request->header('db') == 'transaction') {
            DB::beginTransaction();
        }
        $response = $next($request);
        if ($request->header('db') == 'transaction') {
            DB::rollback();
        }
        return $response;
    }
}
