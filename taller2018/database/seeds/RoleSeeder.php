<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PersonIds = DB::table('person')->pluck('id_person');
        $RoleIds = DB::table('role')->pluck('id_role');

        $IndexPerson = rand(0, count($PersonIds));
        $IndexRole = rand(0, count($RoleIds));



        foreach ((range(1, 20)) as $index) {
            DB::table('person_role')->insert(
                [
                    'id_role' => $RoleIds[$IndexRole],
                    'id_person' => $PersonIds[$IndexPerson]
                ]
            );
        }
    }
}
