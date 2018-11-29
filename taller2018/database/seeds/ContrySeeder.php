<?php

use Illuminate\Database\Seeder;

class ContrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogue')->insert([
            'entity' => "Paises",
        ]);

        DB::table('catalogue')->insert([
            'entity' => "Departamentos",
        ]);

        DB::table('level')->insert([
            'level_id' => 0,
            'boss_id' => 0,
        ]);

        DB::table('level')->insert([
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'La Paz',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Santa Cruz',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Cochambamba',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Beni',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Pando',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Chuquisaca',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Potosi',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Oruro',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

        DB::table('items')->insert([
            'name' => 'Tarija',
            'catalogue_id'=> 2,
            'level_id' => 1,
            'boss_id' => 0,
        ]);

    }
}
