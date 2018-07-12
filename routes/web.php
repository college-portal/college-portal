<?php

use App\Http\Controllers\AuthGoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('auth/google/redirect', AuthGoogleController::method('redirect'));

Route::get('auth/google/callback', AuthGoogleController::method('callback'));

Route::get('/', function () {
    return view('welcome');
});
