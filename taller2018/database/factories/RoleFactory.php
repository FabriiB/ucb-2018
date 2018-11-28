<?php

// database/factories/CustomerFactory.php
use Faker\Generator as Faker;



$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\UserMod::class, function (Faker $faker) {
    return [
        'firs_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'last_name1' => $faker->lastName,
        'email_verified_at' => now(),
        'birth_day' => $faker->date($format = 'Y-m-d'),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

