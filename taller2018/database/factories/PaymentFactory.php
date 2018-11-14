<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    $users = App\Person::pluck('id_person')->toArray();
    $plan = App\Plan::pluck('id_plan')->toArray();
    return [
        'platform' => $faker->randomElement(['paypal','banco','pagosnet']),
        'date' => $faker->date($format = 'Y-m-d'),
        'status' => 'activo',
        'idPlan' => $faker->randomElement($plan),
        'idUser' => $faker->randomElement($users),

    ];
});
