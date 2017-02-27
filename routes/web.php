<?php
use Illuminate\Http\Request;

Route::any('/', function () {
    return redirect('/screens');
});

Route::group(['middleware' => [
    'auth',
]], function () {

    Route::get('/screens', 'ScreenController@index')
        ->middleware('permission:screen_list')
        ->name('screens');
    Route::get('/screens/create', 'ScreenController@create')
        ->middleware('permission:screen_add');
    Route::post('/screens/create', 'ScreenController@store')
        ->middleware('permission:screen_add');
    Route::get('/screens/view/{screenId}', 'ScreenController@view')
        ->middleware('permission:screen_view')
        ->name('screenView');

    Route::get('/state/create/{screenId}', 'ScreenStateController@create')
        ->name("stateCreate");
    Route::get('/widget/get/{stateWidgetId}', 'WidgetController@get');
    Route::post('/widget/save/{stateWidgetId}', 'WidgetController@save');
    Route::post('/broadcasting/auth', function() {
        return 'ok';
    });

    Route::post('/state/create/{screenId}', 'ScreenStateController@store');

    Route::resource('/tournaments', 'TournamentsController');
    Route::resource('/games', 'GamesController');
    Route::resource('/teams', 'TeamsController');
});

Auth::routes();

Route::get('/test_screen/{id}', function (Request $request, $id) {

    $screen = \App\Screen::where('public_id', $id)
        ->with('game.teamHome')
        ->with('game.teamAway')
        ->firstOrFail();

    $withBg = $request->get("bg");

    return view('test_screen', [
        'screen' => $screen,
        'game' => $screen->game,
        'withBg' => $withBg
    ]);
})->name('test_screen');