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

    public function index(Request $request)
    {
        $screens = $request->user()->screens()->get()->all();
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
        $request->user()->screens()->save($screen);
        return redirect()->action('ScreenStateController@create', ['screen_id' => $screen->id]);
    }
}
