<?php

/*
 *  Misc Pages
*/

Route::get('/', 'PageController@welcome');


Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

Route::get('/wordcloud/create', 'WordCloudController@create');
Route::post('/wordcloud/create', 'WordCloudController@createWordCloud');