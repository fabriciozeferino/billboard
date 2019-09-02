<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'PublicController@index');

Route::get('/{any}', 'PublicController@index')->where('any', '.*');

//
//Auth::routes();
//
//Route::group(['middleware' => 'auth'], function () {
//
//    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
//
//    /*Route::resource('projects', 'ProjectController');
//
//    Route::resource('projects/{project}/tasks', 'TaskController');
//
//    Route::get('projects/{project}/activities', 'ActivityController@show');
//
//    Route::get('/home', 'HomeController@index')->name('home');*/
//
//});

