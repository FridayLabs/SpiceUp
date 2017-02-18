<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/screens', 'ScreenController@index')->name("screens");
Route::get('/screens/create', 'ScreenController@create');
Route::post('/screens/create', 'ScreenController@store');
Route::get('/screens/view/{screenId}', 'ScreenController@view');

Route::get('/state/create/{screenId}', 'ScreenStateController@create');

Route::get('/test_screen', function() {
   return view('test_screen');
});
Route::post('/state/create/{screenId}', 'ScreenStateController@store');