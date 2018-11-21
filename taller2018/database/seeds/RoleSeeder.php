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

        $MaxRange =  DB::table('person')->max('id_person');

        foreach ((range(0, $MaxRange)) as $index) {//one more than permision seeder range

            $IndexPerson = rand(0, count($PersonIds)-1);
            $IndexRole = rand(0, count($RoleIds)-1);
            DB::table('person_role')->insert(
                [
                    'id_role' => $RoleIds[$IndexRole],
                    'id_person' => $PersonIds[$IndexPerson]
                ]
            );
        }
    }
}
