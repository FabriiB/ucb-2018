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
        $PersonIds = DB::table('person')->lists('id_person');
        $roleIds = DB::table('roles')->lists('id_role');

        foreach ((range(1, 20)) as $index) {
            DB::table('role')->insert(
                [
                    'id_role' => $PersonIds[array_rand($roleIds)],
                    'id_person' => $PersonIds[array_rand($roleIds)]
                ]
            );
        }
    }
}