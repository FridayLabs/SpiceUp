<?php

namespace App\Http\Controllers;

use App\Screen;
use App\StateWidget;
use Illuminate\Http\Request;
use Auth;

class WidgetController extends Controller
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

    public function get(Request $request, $stateWidgetId) {
        $stateWidget = StateWidget::findOrFail($stateWidgetId);
        return array(
            "is_active" => $stateWidget->is_active,
            "position" => $stateWidget->position,
            "data" => json_decode($stateWidget->data, true),
        );
    }

    public function save(Request $request, $stateWidgetId) {
        $stateWidget = StateWidget::findOrFail($stateWidgetId);

        $data = $request->get("data");
        $is_active = $request->get("is_active");
        $position = $request->get("position");
        $stateWidget->data = json_encode($data);
        $stateWidget->is_active = $is_active;
        $stateWidget->position = $position;
        $stateWidget->save();

        return array($stateWidget->title);
    }

    public function update(Request $request, $stateWidgetId)
    {
        $stateWidget = StateWidget::findOrFail($stateWidgetId);//todo check user access

        
        
        $screen = new Screen();
        $screen->public_id = uniqid('', true); // TODO
        $screen->title = $request->get('title');
        $screen->save();
        return redirect()->action('ScreenStateController@create', ['screen_id' => $screen->id]);
    }
}
