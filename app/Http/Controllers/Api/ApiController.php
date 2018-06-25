<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponseTrait;

    /**
     * returns the method identifier e.g. \App\Controllers\Controller@create
     * 
     * @param string $name (the name of the method)
     * 
     * @return string
     */
    public static function method (string $name):string { return '\\' . static::class . '@' . $name; }

    /**
     * returns the class identifier prefixed with a backslash e.g. \App\Controllers\Controller
     * 
     * @return string
     */
    public static function class ():string { return '\\' . static::class; }
}
