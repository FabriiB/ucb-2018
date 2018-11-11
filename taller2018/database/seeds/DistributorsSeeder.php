<?php

use Illuminate\Database\Seeder;

class DistributorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('ALTER TABLE distributors DISABLE TRIGGER ALL;');

        for ($cont=1;$cont<=31;$cont++){
            DB::table('order')->insert([
                'idDistributor' => "$cont",
                'id' => "$cont",
                'name' => str_random(10),
                'contact' => '111222333',
                'commision' => 444555666,
                'medium' => "1",
                'remember_token' => "'".$cont."'",
                'created_at' => "'2018-11-07 23:27:59'",
                'updated_at' => "'2018-11-07 23:28:00'",
                'transaction_id' => "$cont",
                'transaction_date' => "'2018-11-07 23:28:01'",
                'transaction_host' => "'host tx'",
                'transaction_user' => "'usuario tx'"
            ]);
        }

        DB::statement('ALTER TABLE distributors ENABLE TRIGGER ALL;');

    }
}
