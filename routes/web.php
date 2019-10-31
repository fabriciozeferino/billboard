<?php

Route::get('/cv', function (){
   return view('cv/index');
});

Route::get('{path}', function () {
    return view('app');
})->where('path', '(.*)');


