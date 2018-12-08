<?php

use Faker\Generator as Faker;

$factory->define(App\Items::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->country,
        'catalogue_id'=> 1,
        'level_id' => 1,
        'boss_id' => 0,
    ];
});
