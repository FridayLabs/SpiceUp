<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Tournament::class, function (Faker\Generator $faker) {
    return [
        'title' => implode(' ', $faker->words(3)),
    ];
});

$factory->define(\App\Game::class, function (Faker\Generator $faker) {
    return [
        'score_home' => 0,
        'score_away' => 0,
        'date_planned' => $faker->dateTime,
        'date_started' => $faker->dateTime,
        'status' => 'planned'
    ];
});

$factory->define(\App\Team::class, function (Faker\Generator $faker) {
    return [
        'title' => implode(' ', $faker->words(3)),
        'city' => $faker->city,
        'color1' => $faker->colorName,
        'color2' => $faker->colorName,
    ];
});

$factory->define(\App\Player::class, function (Faker\Generator $faker) {
    static $i = 0;
    $positions = ['forward', 'midfielder', 'defender', 'goalkeeper'];
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'position' => $positions[$i++ % count($positions)]
    ];
});