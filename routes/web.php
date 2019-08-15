<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PublicController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('projects', 'ProjectController');

    Route::resource('projects/{project}/tasks', 'TaskController');

    Route::get('projects/{project}/activities', 'ActivityController@show');

    Route::get('/home', 'HomeController@index')->name('home');

});

