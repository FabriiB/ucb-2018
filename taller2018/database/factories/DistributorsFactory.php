<?php

use Faker\Generator as Faker;
$factory->define(App\Distributors::class, function (Faker $faker) {

    return [
        'id' => $faker->randomDigit,
        'name' => $faker->name,
        'contact' => $faker->address,
        'commision' => $faker->randomDigit,
        'medium' => $faker->name,

    ];
});
