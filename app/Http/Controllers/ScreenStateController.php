<?php

namespace App\Http\Controllers;

use App\Screen;
use Illuminate\Http\Request;

class ScreenStateController extends Controller
{
    public function create(Request $request, $screenId)
    {
        $screen = Screen::findOrFail($screenId);
        return view('screen.state.create', compact('screen'));
    }
}
