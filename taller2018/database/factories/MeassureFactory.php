<?php

use Faker\Generator as Faker;

$factory->define(App\Meassure::class, function (Faker $faker) {
    return [
        'unit' => $faker->randomElement(['unit1','unit2','unit3']),
        'name' => $faker->randomElement(['name1','name2','name3']),
        'type' => $faker->randomElement(['type1','type2','type3']),
    ];
});
