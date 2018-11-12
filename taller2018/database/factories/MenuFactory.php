<?php

use Faker\Generator as Faker;
$factory->define(App\Menu::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'date_created' => $faker->date($format = 'Y-m-d'),
        'date_end' => $faker->date($format = 'Y-m-d'),
        'name' => $faker->name,
        'status'=>'activo',
        'id_user' => $faker->randomElement($users),


    ];
});
