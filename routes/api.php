<?php

Route::prefix('v1')->group(function () {

    // Auth
    Route::prefix('auth')->group(function () {

        Route::post('register', 'Auth\RegisterController@register');

        Route::post('login', 'Auth\LoginController@login');

        Route::post('logout', 'Auth\LoginController@logout');

        Route::get('refresh', 'Auth\AuthController@refresh');

        Route::post('check-token', 'Auth\AuthController@checkToken');


        // Just Authenticated
        Route::middleware('auth:api')->group(function () {

            Route::get('user', 'Auth\AuthController@user');

        });
    });

    // Projects
    Route::middleware('auth:api')->group(function () {

        Route::resource('projects', 'ProjectController');
    });

});
