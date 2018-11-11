<?php

use Faker\Generator as Faker;
$factory->define(App\Distributors::class, function (Faker $faker) {

    return [
        'date_created' => $faker->date($format = 'Y-m-d'),
        'date_end' => $faker->date($format = 'Y-m-d'),
        'name' => $faker->name,
        'status'=>'activo',

    ];
});
