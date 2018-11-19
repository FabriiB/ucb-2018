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

        $IndexRole = rand(0, count($RoleIds));
        $IndexPermision = rand(0, count($PermisionIds));



        foreach ((range(10, 2)) as $index) {
            DB::table('role_permision')->insert(
                [
                    'id_permision' => $PermisionIds[$IndexPermision],
                    'id_role' => $RoleIds[$IndexRole]
                ]
            );
        }
    }
}
