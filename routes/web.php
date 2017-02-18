<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/screens', 'ScreenController@index');
Route::get('/screens/create', 'ScreenController@create');
Route::post('/screens/create', 'ScreenController@store');

Route::get('/state/create/{screenId}', 'ScreenStateController@create');