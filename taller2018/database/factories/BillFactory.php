<?php

use Faker\Generator as Faker;

$factory->define(App\Drink::class, function (Faker $faker) {
    $users = App\Payment::pluck('idPayment')->toArray();
    return [


        'control_code' => '1JHG7765',
        'issue_date' =>$faker->date($format = 'Y-m-d'),
        'number_bill'=>$faker->randomDigit,
        'total_bill'=>$faker->randomDigit,
        'description_bill'=> $faker->randomElement(['type1','type2','type3']),
        'identifier'=>'123456789',
        'email'=> $faker->safeEmail,
        'limit_issue_date'=> $faker->date($format = 'Y-m-d'),
        'authorization_number' =>'12456787',
        'idCompany'=> 1,
        'id_payment'=> $faker->randomElement($users),
    ];
});
