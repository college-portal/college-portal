<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
        'prefix' => '/'
    ], function () {
    /**
     * non-auth routes
     */
    Route::get('/', function (Request $request) {
        return [
            'message' => 'zaportal'
        ];
    });

    Route::post('auth', 'Api\AuthController@login');

    /**
     * auth routes
     */

    Route::group([
        'middleware' => 'accessTokenSecurity'
    ], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });        
    });
});