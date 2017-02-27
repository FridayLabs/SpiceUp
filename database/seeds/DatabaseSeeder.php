<?php

use App\User;
use App\Screen;
use App\ScreenState;
use App\Widget;
use App\StateWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
                if($team_home->id == $team_away->id) {
                    continue;
                }
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
            'game_id' => 1,
            'user_id' => $user->id
        ]);

        $state = ScreenState::create([
            'title' => 'State 1',
            'screen_id' => $screen->id
        ]);
        $widgets = [
            [
                'title' => 'score',
                'type' => 'Score',
                'data' => '[]'
            ],
            [
                'title' => 'timer',
                'type' => 'Timer',
                'data' => '[]'
            ]
        ];
        foreach ($widgets as $widgetData) {
            $widget = Widget::create($widgetData);
            StateWidget::create([
                'state_id' => $state->id,
                'position' => '[120,20]',
                'data' => '',
                'widget_id' => $widget->id
            ]);
        }

        $role = Role::create(['name' => 'superuser']);
        $roleDirector = Role::create(['name' => 'director']);
        $permissionNames = [
            'screen_list',
            'screen_view',
            'screen_edit',
            'screen_add',
            'game_access',
            'tournament_access',
            'team_access',
        ];
        foreach ($permissionNames as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }
        $role->givePermissionTo($permissionNames);
        $roleDirector->givePermissionTo([
            'screen_view',
            'screen_edit',
            'screen_add',
        ]);

        $user->assignRole('superuser');

        $userDirector = User::create([
            'name' => 'Director',
            'email' => 'director@asd.ru',
            'password' => bcrypt('123123')
        ]);
        $userDirector->assignRole('director');

        // $this->call(UsersTableSeeder::class);
    }
}
