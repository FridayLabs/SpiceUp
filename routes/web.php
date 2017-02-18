<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/screens', 'ScreenController@index')->name("screens");
Route::get('/screens/create', 'ScreenController@create');
Route::post('/screens/create', 'ScreenController@store');
Route::get('/screens/view/{screenId}', 'ScreenController@view')->name("screenView");

Route::get('/state/create/{screenId}', 'ScreenStateController@create');
Route::post('/state/create/{screenId}', 'ScreenStateController@store');