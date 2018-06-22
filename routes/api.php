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
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\ChargeableServiceController;
use App\Http\Controllers\Api\ChargeableController;

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
        $excepts = [ 
            'except' => [ 'create', 'edit' ]
        ];
        Route::get('/user', AuthController::method('current'));  
        
        Route::resource('/schools', SchoolController::class(), $excepts);
        
        Route::resource('/users', UserController::class(), $excepts);
        
        Route::resource('/faculties', FacultyController::class(), $excepts);
        
        Route::resource('/departments', DepartmentController::class(), $excepts);
        
        Route::resource('/programs', ProgramController::class(), $excepts);
        
        Route::resource('/schools/{school_id}/levels', LevelController::class(), $excepts);
        
        Route::resource('/students', StudentController::class(), $excepts);
        
        Route::resource('/courses', CourseController::class(), $excepts);
        
        Route::resource('/schools/{school_id}/semester-types', SemesterTypeController::class(), $excepts);
        
        Route::resource('/staff', StaffController::class(), $excepts);
        
        Route::resource('/sessions', SessionController::class(), $excepts);
        
        Route::resource('/semesters', SemesterController::class(), $excepts);
        
        Route::resource('/chargeable-services', ChargeableServiceController::class(), $excepts);
        
        Route::resource('/chargeables', ChargeableController::class(), $excepts);
    });

    /**
     * non-auth routes
     */
    
    Route::post('/users', UserController::method('store'));
});