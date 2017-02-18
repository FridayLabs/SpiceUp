<?php

use App\User;
use App\Screen;
use App\ScreenState;
use App\Widget;
use App\StateWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user = User::create([
            'name' => 'VK',
            'email' => 'asd@asd.ru',
            'password' => bcrypt('123123')
        ]);

        $tournament = factory(\App\Tournament::class)->create();
        $teams = [];
        foreach (range(0, 10) as $_) {
            $team = factory(\App\Team::class)->create();
            $team->players()->saveMany(factory(\App\Player::class, 11)->make());
            $teams[] = $team;
        }

        foreach ($teams as $team_home) {
            foreach ($teams as $team_away) {
                $tournament->games()->save(
                    factory(\App\Game::class)->make([
                        'team_home' => $team_home->id,
                        'team_away' => $team_away->id,
                    ])
                );
            }
        }

        $screen = Screen::create([
            'title' => 'keke screen',
            'user_id' => $user->id
        ]);

        $state = ScreenState::create([
            'title' => 'State 1',
            'screen_id' => $screen->id
        ]);

        $widget = Widget::create([
            'title' => 'score',
            'data' => "[]"
        ]);

        $stateWidget = StateWidget::create([
            'state_id' => $state->id,
            'position' => '[120,20]',
            'type' => '',
            'data' => '',
            'widget_id' => $widget->id
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
