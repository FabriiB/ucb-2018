<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('company')->insert([
                'id_company' => '1',
                'name' => 'Satellite',
                'heading' => 'ventas abc',
                'identifier' => '10028',
                'country' => 'Bolivia',
                'region' => 'America']);



    }
}

