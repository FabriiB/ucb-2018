<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firs_name' => $faker->name,
        'last_name1' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'birth_day' => $faker->date($format = 'Y-m-d'),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Distributors::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->userName,
        'name' => $faker->email,
        'contact' => $faker->name,
        'comision' => $faker->str_ramdon,
        'medium' => $faker->name,
        'remember_token' =>  str_random(10),
        'created_at' => $faker->name,
        'updated_at' => $faker->name,
        'transaction_id' => $faker->name,
        'transaction_date' => $faker->name,
        'transaction_host' => $faker->name,
        'transaction_user' => $faker->name,
    ];
});
