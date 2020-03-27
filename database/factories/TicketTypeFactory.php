<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$defineName = \App\Models\TicketType::class;
$factory->define($defineName, function (Faker $faker) {
    return [
        'name' => '種別'. $faker->randomDigitNotNull,
    ];
});
