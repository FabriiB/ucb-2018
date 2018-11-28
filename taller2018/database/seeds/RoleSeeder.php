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
        $UserIds = DB::table('users')->pluck('id');
        $RoleIds = DB::table('role')->pluck('id_role');

        $MaxRange =  DB::table('users')->max('id');

        foreach ((range(0, $MaxRange)) as $index) {//one more than permision seeder range

            $IndexUser = rand(0, count($UserIds)-1);
            $IndexRole = rand(0, count($RoleIds)-1);
            DB::table('users_role')->insert(
                [
                    'id_role' => $RoleIds[$IndexRole],
                    'id_users' => $UserIds[$IndexUser]
                ]
            );
        }
    }
}
