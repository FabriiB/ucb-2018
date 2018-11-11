<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('TRUNCATE TABLE order CASCADE;');
        factory(User::class,50)->create();
        factory(Person::class,50)->create();

    }
}
