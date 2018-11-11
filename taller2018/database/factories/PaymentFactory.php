<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    $users = App\Person::pluck('id_person')->toArray();
    $plan = App\Plan::pluck('id_plan')->toArray();
    return [
        'price' => $faker->randomElement(['100','200','300','150','250','350']),
        'type' => $faker->randomElement(['efectivo','tarjeta','trasnferencia']),
        'platform' => $faker->randomElement(['paypal','banco','pagosnet']),
        'date' => $faker->date($format = 'Y-m-d'),
        'status' => 'activo',
        'idPlan' => $faker->randomElement($plan),
        'idUser' => $faker->randomElement($users),

    ];
});
