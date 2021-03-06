<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::any('/', function () {
    return redirect('/screens');
});

Route::get('/screens', 'ScreenController@index')->name('screens');
Route::get('/screens/create', 'ScreenController@create');
Route::post('/screens/create', 'ScreenController@store');
Route::get('/screens/view/{screenId}', 'ScreenController@view')->name('screenView');

Route::get('/state/create/{screenId}', 'ScreenStateController@create')->name("stateCreate");
Route::get('/widget/get/{stateWidgetId}', 'WidgetController@get');
Route::post('/widget/save/{stateWidgetId}', 'WidgetController@save');

Route::get('/test_screen/{id}', function ($id) {

    $screen = \App\Screen::where('public_id', $id)
        ->with('game.teamHome')
        ->with('game.teamAway')
        ->firstOrFail();

    return view('test_screen', [
        'screen' => $screen,
        'game' => $screen->game
    ]);
});
Route::post('/state/create/{screenId}', 'ScreenStateController@store');


Route::resource('/tournaments', 'TournamentsController');
Route::resource('/games', 'GamesController');
Route::resource('/teams', 'TeamsController');

