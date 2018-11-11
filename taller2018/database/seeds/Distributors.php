<?php

use Illuminate\Database\Seeder;

class Distributors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($cont=1;$cont<=31;$cont++){
            DB::table('order')->insert([
                'idOrder' => "$cont",
                'orderDate' => "'2018-11-07 23:27:57'",
                'status' => 'En proceso',
                'cancelDate' => "'2018-11-08 23:27:57'",
                'idUser' => "1",
                'idPlan' => "$cont",
                'remember_token' => "'".$cont."'",
                'created_at' => "'2018-11-07 23:27:57'",
                'updated_at' => "'2018-11-07 23:27:58'"
            ]);
        }

    }
}
