<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WordsResult;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(WordsResult::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'start_at' => $faker->dateTime(),
        'recall_time' => rand(1000, 100000),
    ];
});
