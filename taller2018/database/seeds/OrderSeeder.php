<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
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
//INSERT INTO "public"."order" ("idOrder", "orderDate", "status", "cancelDate", "idUser", "idPlan", "remember_token", "created_at", "updated_at")
//VALUES (1, '2018-11-07 23:27:57', 'En progreso', '2018-11-09 04:50:22', 1, 1, '1', '2018-11-07 23:50:44', '2018-11-07 23:59:49')
}
