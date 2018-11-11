<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;
use App\Meassure;

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
        factory(Meassure::class,10)->create();
        $this->call(
            OrderSeeder::class,
            DistributorSeeder::class
        );




    }
}
