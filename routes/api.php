<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FacultyController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SemesterTypeController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\SessionController;

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

    Route::post('auth', AuthController::method('login'));

    /**
     * auth routes
     */

    Route::group([
        'middleware' => 'accessTokenSecurity'
    ], function () {
        Route::get('/user', AuthController::method('current'));  
        
        Route::resource('/schools', SchoolController::class());
        
        Route::resource('/users', UserController::class());
        
        Route::resource('/faculties', FacultyController::class());
        
        Route::resource('/departments', DepartmentController::class());
        
        Route::resource('/programs', ProgramController::class());
        
        Route::resource('/schools/{school_id}/levels', LevelController::class());
        
        Route::resource('/students', StudentController::class());
        
        Route::resource('/courses', CourseController::class());
        
        Route::resource('/schools/{school_id}/semester-types', SemesterTypeController::class());
        
        Route::resource('/staff', StaffController::class());
        
        Route::resource('/sessions', SessionController::class());
    });

    /**
     * non-auth routes
     */
    
    Route::post('/users', UserController::method('store'));
});