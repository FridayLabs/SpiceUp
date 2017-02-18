<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        User::create([
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

    }
}
