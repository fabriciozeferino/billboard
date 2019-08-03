<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PublicController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/projects', 'ProjectsController');

    Route::resource('/projects/{project}/tasks/{task}', 'TaskController');

    Route::get('/home', 'HomeController@index')->name('home');
});

