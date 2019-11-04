<?php

Route::get('/resume', function (){
   return view('resume/index');
});

Route::get('{path}', function () {
    return view('app');
})->where('path', '(.*)');


