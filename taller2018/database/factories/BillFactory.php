<?php

use Faker\Generator as Faker;

$factory->define(App\Bill::class, function (Faker $faker) {
    $users = App\Payment::pluck('idPayment')->toArray();
    return [


        'control_code' => 'B5-96-59-2A-27',
        'issue_date' =>$faker->date($format = 'Y-m-d'),
        'number_bill'=>$faker->randomDigit,
        'total_bill'=>$faker->randomDigit,
        'identifier'=>'123456789',
        'email'=> $faker->safeEmail,
        'limit_issue_date'=> $faker->date($format = 'Y-m-d'),
        'authorization_number' =>'798347',
        'idCompany'=> 1,
        'id_payment'=> $faker->randomElement($users),
    ];
});
