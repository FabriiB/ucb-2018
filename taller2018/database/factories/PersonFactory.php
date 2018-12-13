<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'id_user' => 10,
        'firs_name' => $faker->name,
        'last_name1' => $faker->lastName,
        'last_name2' => $faker->lastName,
        'address1' => $faker->address,
        'address2' => $faker->address,
        'phone' => $faker->randomDigit,
        'mobile' => $faker->randomDigit,
        'nit' => $faker->randomDigit,
        'city' => $faker->city,
        'country' => $faker->country,
        'birthDay' => $faker->date($format = 'Y-m-d'),
    ];
});


