<?php

/*
 *  Misc Pages
*/

Route::get('/', 'PageController@welcome');

Route::get('/create', 'PageController@create');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
