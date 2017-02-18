<?php

namespace App\Http\Controllers;

use App\Screen;
use Illuminate\Http\Request;
use Auth;

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
        $screens = Screen::query()->where('user_id', Auth::id())->get()->all();
        return view('screen.index', compact('screens'));
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
