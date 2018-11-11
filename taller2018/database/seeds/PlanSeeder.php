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
    }
}
