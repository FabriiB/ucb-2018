<?php

use Illuminate\Database\Seeder;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoleIds = DB::table('role')->pluck('id_role');
        $PermisionIds = DB::table('permision')->pluck('id_permision');

        $MaxRange =  DB::table('role')->max('id_role');

        foreach ((range(0, $MaxRange)) as $index) {

            $IndexRole = rand(0, count($RoleIds)-1);
            $IndexPermision = rand(0, count($PermisionIds)-1);
            DB::table('role_permision')->insert(
                [
                    'id_permision' => $PermisionIds[$IndexPermision],
                    'id_role' => $RoleIds[$IndexRole]
                ]
            );
        }
    }
}
