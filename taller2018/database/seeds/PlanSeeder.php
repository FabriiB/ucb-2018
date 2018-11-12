<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan')->insert([
            'type' => 'individual',
            'price' => '100',
            'client_number' => 1,
            'drink_plan' => false,
        ]);

        DB::table('plan')->insert([
            'type' => 'individual',
            'price' => '150',
            'client_number' => 1,
            'drink_plan' => true,
        ]);

        DB::table('plan')->insert([
            'type' => 'duo',
            'price' => '200',
            'client_number' => 2,
            'drink_plan' => false,
        ]);

        DB::table('plan')->insert([
            'type' => 'duo',
            'price' => '250',
            'client_number' => 2,
            'drink_plan' => true,
        ]);

        DB::table('plan')->insert([
            'type' => 'familiar',
            'price' => '300',
            'client_number' => 3,
            'drink_plan' => false,
        ]);

        DB::table('plan')->insert([
            'type' => 'duo',
            'price' => '350',
            'client_number' => 3,
            'drink_plan' => true,
        ]);
    }
}
