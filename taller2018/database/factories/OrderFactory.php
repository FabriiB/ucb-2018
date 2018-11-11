<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {

    $users = App\Person::pluck('id_person')->toArray();
    $plan = App\Plan::pluck('id_plan')->toArray();
    $menu_dish = App\MenuDish::pluck('id_menu_dish')->toArray();
    return [
        'orderDate' => $faker->date($format='Y-m-d'),
        'status' => 'En proceso',
        'cancelDate' => $faker->date($format='Y-m-d'),
        'idPlan' => $faker->randomElement($plan),
        'id_person' => $faker->randomElement($users),
        'id_menu_dish' => $faker->randomElement($menu_dish),
    ];
});
