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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::resource('projects', 'ProjectController');
//
//Route::group(['middleware' => 'auth'], function () {
//
//
//    /*Route::resource('projects/{project}/tasks', 'TaskController');
//
//   Route::get('projects/{project}/activities', 'ActivityController@show');
//
//   Route::get('/home', 'HomeController@index')->name('home');*/
//
//});



Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        Route::post('register', 'Auth\AuthController@register');
        // Login User
        Route::post('login', 'Auth\AuthController@login');

        // Refresh the JWT Token
        Route::get('refresh', 'Auth\AuthController@refresh');

        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'Auth\AuthController@user');
            // Logout user from application
            Route::post('logout', 'Auth\AuthController@logout');
        });

    });

    Route::middleware('auth:api')->group(function () {

        Route::resource('projects', 'ProjectController');
    });


});

Route::middleware('auth:api')->group(function () {
    Route::get('dashboard', function () {
        return response()->json(['data' => 'Test Data']);
    });
});
