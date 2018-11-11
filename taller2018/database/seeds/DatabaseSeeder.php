<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;
use App\Meassure;
use App\Distributors;
use App\Menu;
use App\Payment;
use App\Dish;
use App\Drink;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(
            UserSeeder::class
        );

        $this->call(
            PlanSeeder::class
        );

        $this->call(
            OrderSeeder::class
        );

        $this->call(
            CompanySeeder::class
           // DistributorSeeder::class
        );

        factory(User::class,50)->create();
        factory(Person::class,50)->create();
        factory(Meassure::class,10)->create();
        factory(Distributors::class,50)->create();
        factory(Menu::class,50)->create();
        factory(Payment::class,10)->create();
        factory(Dish::class,10)->create();
        factory(Drink::class,10)->create();
    }
}
