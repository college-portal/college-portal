<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class AuthController extends ApiController
{

    public function login(Request $request) {
        return response()->json($request);
    }
    
}
