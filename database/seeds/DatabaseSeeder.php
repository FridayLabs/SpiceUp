<?php

use App\User;
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

        User::create([
            'name' => 'VK',
            'email' => 'asd@asd.ru',
            'password' => bcrypt('123123')
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
