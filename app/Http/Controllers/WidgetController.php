<?php

namespace App\Http\Controllers;

use App\Events\GoalEvent;
use App\Events\TestEvent;
use App\Screen;
use App\StateWidget;
use App\Widgets\ScoreWidget;
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
        $return = [
            "isActive" => $stateWidget->is_active,
            "position" => $stateWidget->position,
        ];
        $data = json_decode($stateWidget->data, true);
        switch ($stateWidget->widget->type) {
            case "Score":
                $screen = $stateWidget->state->screen;
                $game = $screen->game;

                $return["teams"] = [
                    "home" => [
                        "id" => $game->teamHome->id,
                        "name" => $game->teamHome->title,
                        "score" => $game->score_home,
                        "players" => $game->teamHome->players()->orderBy("last_name")->get()
                    ],
                    "away" => [
                        "id" => $game->teamAway->id,
                        "name" => $game->teamAway->title,
                        "score" => $game->score_away,
                        "players" => $game->teamAway->players()->orderBy("last_name")->get()
                    ]
                ];
                $return["goalList"] = (isset($data["goalList"]))?$data["goalList"]:[];
                break;
        };
        
        return $return;
    }

    public function save(Request $request, $stateWidgetId) {
        $returnData = [];
        $stateWidget = StateWidget::findOrFail($stateWidgetId);

        $isActive = $request->get("isActive");
        $position = $request->get("position");

        switch ($stateWidget->widget->type) {
            case "Score":
                $screen = $stateWidget->state->screen;
                $game = $screen->game;
                $reqTeams = $request->get("teams");
                if ($game->score_home != $reqTeams["home"]["score"]) {
                    $game->score_home = $reqTeams["home"]["score"];
                    if($game->save()) {
                        event(new GoalEvent($stateWidget, 'teamA', $game->score_home));
                    }
                }
                if ($game->score_away != $reqTeams["away"]["score"]) {
                    $game->score_away = $reqTeams["away"]["score"];
                    if($game->save()) {
                        event(new GoalEvent($stateWidget, 'teamB', $game->score_away));
                    }
                }
                $stateWidget->data = json_encode(["goalList" => $request->get("goalList")]);
                break;
            
        }
        $stateWidget->is_active = $isActive;
        $stateWidget->position = $position;
        if($stateWidget->save()) {

        }
        return $returnData;
    }

    public function update(Request $request, $stateWidgetId)
    {
        $stateWidget = StateWidget::findOrFail($stateWidgetId);//todo check user access

        
        
        $screen = new Screen();
        $screen->public_id = uniqid('', true); // TODO
        $screen->title = $request->get('title');
        $screen->save();
        
        event(new TestEvent($stateWidget));
        return redirect()->action('ScreenStateController@create', ['screen_id' => $screen->id]);
    }
}
