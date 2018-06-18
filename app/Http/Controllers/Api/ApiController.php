<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json($data) {
        return response()->json($data);
    }

    public function ok($data = null) {
        return response()->json($data ?? [
            'message' => 'success'
        ]);
    }

    public function notFound($message = null) {
        return response()->json([
            'message' => $message ?? 'not found'
        ], 404);
    }
    
    public function badRequest($message = null) {
        return response()->json([
            'message' => $message ?? 'invalid request'
        ], 400);
    }
    
    public function error($message = null, Exception $ex = null) {
        return response()->json([
            'message' => $message ?? 'an error occurred',
            'exception' => $ex
        ], 500);
    }
    
    public function conflict($message = null) {
        return response()->json([
            'message' => $message ?? 'there was a conflict'
        ], 409);
    }

    public static function method ($name) {
        return '\\' . static::class . '@' . $name;
    }
}
