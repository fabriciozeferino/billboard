<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/projects', 'ProjectsController');

    Route::resource('/projects/{project}/tasks', 'TaskController');

    Route::get('/home', 'HomeController@index')->name('home');
});

