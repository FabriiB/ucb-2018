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
use App\DishDrink;
use App\MenuDish;
use App\Bill;
use App\Role;
use App\Permision;

use App\Order;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //user and person needs to be seeded before the many to many seeding
        factory(User::class,50)->create();
        //person needs to be before the seeding for permisions management
        factory(Person::class,10)->create();

        //need to seed specific roles
        DB::table('role')->insert([
            'name' => 'Admin',
        ]);
        DB::table('role')->insert([
            'name' => 'User',
        ]);
        //need to seed specific permisions
        DB::table('permision')->insert([
            'name' => 'Admin',
        ]);
        DB::table('permision')->insert([
            'name' => 'User',
        ]);

/*
        $this->call(
            RoleSeeder::class
        );

        $this->call(
            PermisionSeeder::class
        );
*/
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


        factory(Meassure::class,10)->create();
        factory(Distributors::class,50)->create();
        factory(Menu::class,10)->create();
        factory(Payment::class,10)->create();
        factory(Dish::class,10)->create();
        factory(Drink::class,10)->create();
        factory(DishDrink::class,10)->create();
        factory(MenuDish::class,10)->create();
        factory(Bill::class,10)->create();
        factory(Order::class,30)->create();


    }
}
