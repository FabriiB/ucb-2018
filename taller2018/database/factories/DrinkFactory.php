<?php

use Faker\Generator as Faker;

$factory->define(App\Drink::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $m = App\Meassure::pluck('id_meassure')->toArray();
    return [
        'name' => $faker->name,
        'type'=> $faker->randomElement(['type1','type2','type3']),
        'caducity_date'=>$faker->date($format = 'Y-m-d'),
        'packaging_date'=>$faker->date($format = 'Y-m-d'),
        'id_meassure'=>$faker->randomElement($m),
        'id_user' => $faker->randomElement($users),
        'status'=> 'activo',
        'description'=> $faker->randomElement(['desc1','desc2','desc3']),
        'date_created' => $faker->date($format = 'Y-m-d'),
    ];
});
