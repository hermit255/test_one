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

$defineName = \App\Models\PublishedTicket::class;
$factory->define($defineName, function (Faker $faker) {
    $num = $faker->unique()->numberBetween(1,100);
    return [
        'ticket_class_id' => rand(1, 10),
        'user_id_purchaser' => rand(1, 10),
        'user_id_owner' => rand(1, 10),
        'purchased_at' => $faker->dateTime,
        'used_at' => $faker->dateTime,
        'branch_id_used_at' => rand(1, 10),
        'download_status' => rand(1, 1),
        'downloaded_at' => $faker->dateTime,
        'tel' => $faker->phoneNumber,
    ];
});