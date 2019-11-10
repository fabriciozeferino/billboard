<?php

Route::prefix('v1')->group(function () {

    // Auth
    Route::prefix('auth')->group(function () {

        Route::post('register', 'Auth\RegisterController@register');

        Route::post('login', 'Auth\LoginController@login');

        Route::post('logout', 'Auth\LoginController@logout');


        // Just Authenticated
        Route::middleware(['auth:api', 'jwt.auth'])->group(function () {

            Route::get('user', 'Auth\AuthController@user');

            Route::get('/token/refresh', 'Auth\AuthController@refresh');
        });
    });

    // Authenticated routes
    Route::middleware(['auth:api', 'jwt.auth'])->group(function () {

        // Project
        Route::get('projects/trash', 'ProjectController@trash')
            ->name('projects.trasheed');

        Route::delete('projects/{project}/delete', 'ProjectController@forceDelete')
            ->name('projects.delete');

        Route::resource('projects', 'ProjectController');

        // Tasks
        Route::resource('projects/{project}/tasks', 'TaskController');

        // Logs
        Route::get('projects/{project}/activities', 'ActivityController@show');
    });

});
