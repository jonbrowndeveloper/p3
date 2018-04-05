<?php

/*
 *  Misc Pages
*/

Route::get('/', 'PageController@welcome');


Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

Route::get('/create', 'WordCloudController@create');
Route::post('/create', 'WordCloudController@createWordCloud');