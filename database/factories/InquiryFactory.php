<?php

use Faker\Generator as Faker;

$factory->define(\App\inquiry::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => "966500000000",
        'message' => $faker->paragraph
    ];
});
