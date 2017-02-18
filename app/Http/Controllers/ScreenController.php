<?php

namespace App\Http\Controllers;

use App\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('screen.index');
    }

    public function create()
    {
        return view('screen.create');
    }

    public function view(Request $request, $screenId)
    {
        $screen = Screen::findOrFail($screenId);
        return view('screen.view', compact('screen'));
    }

    public function store(Request $request)
    {
        $screen = new Screen();
        $screen->public_id = uniqid('', true); // TODO
        $screen->title = $request->get('title');
        $screen->save();
        return redirect()->action('ScreenStateController@create', ['screen_id' => $screen->id]);
    }
}