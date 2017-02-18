<?php

namespace App\Http\Controllers;

use App\Screen;
use App\ScreenState;
use Illuminate\Http\Request;

class ScreenStateController extends Controller
{
    public function create(Request $request, $screenId)
    {
        $screen = Screen::findOrFail($screenId);
        return view('screen.state.create', compact('screen'));
    }
    
    public function store(Request $request, $screenId)
    {
        $screen = Screen::findOrFail($screenId);
        $state = new ScreenState();
        $state->title = $request->get('title');
        $state->screen_id = $screenId;
        $state->save();
        return redirect()->action('ScreenController@view', ['screen_id' => $screen->id]);
    }
}
