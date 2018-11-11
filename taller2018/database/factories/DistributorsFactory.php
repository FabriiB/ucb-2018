<?php

use Faker\Generator as Faker;

$factory->define(App\Distributors::class, function (Faker\Generator $faker) {
    $array = medium(
        'Taxi','Moto','Drone'
    );
    return [
        'id' => $faker->randomElement(),
        'name' => $faker->name,
        'contact' => $faker->number,
        'commision' => $faker->number,
        'medium' => $faker->medium,
        'remember_token' =>  str_random(10),
        'created_at' => date($format = 'Y-m-d'),
        'updated_at' => date($format = 'Y-m-d'),
        'transaction_id' => null,
        'transaction_date' => null,
        'transaction_host' => null,
        'transaction_user' => null,
    ];
});
