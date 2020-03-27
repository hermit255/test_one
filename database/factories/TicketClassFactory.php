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

$defineName = \App\Models\TicketClass::class;
$factory->define($defineName, function (Faker $faker) {
    $num = $faker->unique()->numberBetween(1,100);
    return [
        'seq' => $num,
        'name' => '商品名'. $num,
        'ticket_type_id' => $faker->randomDigitNotNull,
        'rental_type_id' => rand(0, 3),
        'original_price' => 500 * rand(1, 20),
        'discount_price' => 400 * rand(1, 20),
        'number_per_package' => rand(1, 5),
        'available_from' => $faker->dateTime,
        'available_to' => $faker->dateTime,
        'on_sale_from' => $faker->dateTime,
        'on_sale_to' => $faker->dateTime,
    ];
});