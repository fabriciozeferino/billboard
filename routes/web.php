<?php

Route::get('/resume', 'PublicController@resume');

Route::get('{path}', 'PublicController@index')->where('path', '(.*)');

Route::fallback('PublicController@registerNotFound')->name('fallback');

