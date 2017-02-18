<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/screens', 'ScreenController@index');
Route::get('/screens/create', 'ScreenController@create');
