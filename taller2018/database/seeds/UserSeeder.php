<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firs_name' => 'usuario',
            'last_name1' => 'usuario',
            'email' => 'usuario@usuario.com',
            'email_verified_at' => now(),
            'birth_day' => '1994-11-21',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'firs_name' => 'administrador',
            'last_name1' => 'administrador',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'birth_day' => '1994-11-21',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'is_admin' => true,
        ]);
    }
}
