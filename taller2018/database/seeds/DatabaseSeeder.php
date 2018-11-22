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


        //need to seed specific roles
        DB::table('role')->insert([
            'name' => 'Admin',
        ]);
        DB::table('role')->insert([
            'name' => 'User',
        ]);
        //need to seed specific permisions
        DB::table('permision')->insert([
            'name' => 'Rodrigo',
        ]);
        DB::table('permision')->insert([
            'name' => 'Benji',
        ]);
        DB::table('permision')->insert([
            'name' => 'Cristal',
        ]);
        DB::table('permision')->insert([
            'name' => 'Fabrisio',
        ]);
        //Seeding specific users
        DB::table('users')->insert([
            'firs_name' => 'Rodrigo',
            'email' => 'rodrigo@rodrigo.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'status' => 'active',
            'last_name1' => 'rod',
            'birth_day' => '1976-09-29',
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'firs_name' => 'Benji',
            'email' => 'benji@benji.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'status' => 'active',
            'last_name1' => 'ben',
            'birth_day' => '1976-09-29',
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'firs_name' => 'Cristal',
            'email' => 'cristal@cristal.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'status' => 'active',
            'last_name1' => 'cris',
            'birth_day' => '1976-09-29',
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'firs_name' => 'Fabrisio',
            'email' => 'fabricio@fabricio.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'status' => 'active',
            'last_name1' => 'fab',
            'birth_day' => '1976-09-29',
            'is_admin' => true,
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

        //user and person needs to be seeded before the many to many seeding
        factory(App\UserMod::class,50)->create();
        factory(User::class,50)->create();
        //person needs to be before the seeding for permisions management
        factory(Person::class,10)->create();

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
