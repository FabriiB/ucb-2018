<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->randomElement(['dish1','dish2','dish3']),
        'description'=> $faker->randomElement(['type1','type2','type3']),
        'portion'=> $faker->randomElement([1,2,4]),
        'date_created' => $faker->date($format = 'Y-m-d'),
        'images'=> $faker->randomElement(['imagen1','imagen2','imagen3']),
        'status'=> 'activo',
        'type'=> $faker->randomElement(['type1','type2','type3']),
        'tip'=> $faker->randomElement(['tip1','tip2','tip3']),
        'id_user' => $faker->randomElement($users),
    ];
});
