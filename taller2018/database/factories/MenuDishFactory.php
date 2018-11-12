<?php

use Faker\Generator as Faker;

$factory->define(App\MenuDish::class, function (Faker $faker) {
    $m = App\Menu::pluck('id_menu')->toArray();
    $d = App\Dish::pluck('id_dish')->toArray();
    return [
        'date_start' => $faker->date($format = 'Y-m-d'),
        'date_end' => $faker->date($format = 'Y-m-d'),
        'id_menu' => $faker->randomElement($m),
        'id_dish' => $faker->randomElement($d),
        'status'=> 'activo',
    ];
});
