<?php

// database/factories/CustomerFactory.php
use Faker\Generator as Faker;



$factory->define(App\Permision::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

