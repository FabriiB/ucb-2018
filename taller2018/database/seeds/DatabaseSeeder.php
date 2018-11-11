<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;
use App\Meassure;
use App\Distributors;

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
        $this->call(
            UserSeeder::class
        );

        $this->call(
            PlanSeeder::class
        );

        $this->call(
            OrderSeeder::class
        );

        factory(User::class,50)->create();
        factory(Person::class,50)->create();
        factory(Meassure::class,10)->create();
        factory(Distributors::class,50)->create();




//arreglo benji


    }
}
