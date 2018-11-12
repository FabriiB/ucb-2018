<?php

use Faker\Generator as Faker;

$factory->define(App\DishDrink::class, function (Faker $faker) {
    $m = App\Drink::pluck('id_drink')->toArray();
    $d = App\Dish::pluck('id_dish')->toArray();
    return [
        'date_created' => $faker->date($format = 'Y-m-d'),
        'id_drink' => $faker->randomElement($m),
        'id_dish' => $faker->randomElement($d),
        'status'=> 'activo',
    ];
});
