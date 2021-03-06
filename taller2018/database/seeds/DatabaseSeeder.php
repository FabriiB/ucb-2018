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
use App\Items;
use Carbon\Carbon;
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
            'name' => 'Gestion',
        ]);
        DB::table('role')->insert([
            'name' => 'Caja',
        ]);
        //need to seed specific permisions
        DB::table('permision')->insert([
            'name' => 'Pedidos',
        ]);
        DB::table('permision')->insert([
            'name' => 'Factura',
        ]);
        DB::table('permision')->insert([
            'name' => 'Admin',
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
            'firs_name' => 'Fabricio',
            'email' => 'fabricio@fabricio.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'status' => 'active',
            'last_name1' => 'fab',
            'birth_day' => '1976-09-29',
            'is_admin' => true,
        ]);
        //Seeding specific users_role
        DB::table('users_role')->insert([
            'id_users' => 1,
            'id_role' => 1,
        ]);
        DB::table('users_role')->insert([
            'id_users' => 2,
            'id_role' => 2,
        ]);
        DB::table('users_role')->insert([
            'id_users' => 3,
            'id_role' => 1,
        ]);
        DB::table('users_role')->insert([
            'id_users' => 4,
            'id_role' => 2,
        ]);
        //Seeding specific role_permision
        DB::table('role_permision')->insert([
            'id_permision' => 1,
            'id_role' => 1,
        ]);
        DB::table('role_permision')->insert([
            'id_permision' => 2,
            'id_role' => 2,
        ]);

        DB::table('role_permision')->insert([
            'id_permision' => 3,
            'id_role' => 1,
        ]);
        DB::table('role_permision')->insert([
            'id_permision' => 3,
            'id_role' => 2,
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
            CompanySeeder::class
           // DistributorSeeder::class
        );

       /* $this->call(
            ContrySeeder::class
        // DistributorSeeder::class
        );*/

        //user and person needs to be seeded before the many to many seeding
        factory(App\UserMod::class,50)->create();
        factory(User::class,50)->create();
        //person needs to be before the seeding for permisions management
        factory(Person::class,10)->create();
        //factory(Items::class,190)->create();
        factory(Meassure::class,2)->create();
        factory(Distributors::class,50)->create();
        //factory(Menu::class,2)->create();
        factory(Payment::class,10)->create();
        //factory(Dish::class,2)->create();
        factory(Drink::class,2)->create();
        //factory(DishDrink::class,2)->create();
        //factory(MenuDish::class,2)->create();
        //factory(Bill::class,10)->create();
        factory(Order::class,30)->create();
        $detalle_factura = [["description_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>100,"id_person"=>10,"id_bill"=>1],
            ["description_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>50,"id_person"=>10,"id_bill"=>1],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>350,"id_person"=>10,"id_bill"=>1],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>2],
            ["description_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>2],
            ["description_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>10,"id_bill"=>2],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>3],
            ["description_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>10,"id_bill"=>3],
            ["description_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>3],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>4],
            ["description_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>10,"id_bill"=>4],
            ["description_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>10,"id_person"=>10,"id_bill"=>5],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>10,"id_bill"=>5],
            ["description_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>350,"id_person"=>10,"id_bill"=>5],
            ["description_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>50,"id_person"=>10,"id_bill"=>6],
            ["description_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>10,"id_bill"=>6]];
        $bill = [
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-06-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-06-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-07-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-07-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-08-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-08-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-09-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-09-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-10-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-10-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],
            [ "control_code"=>"B5-96-59-2A-27","issue_date" => "2018-11-10 00:00:00","number_bill"=>1,"total_bill"=>9,"identifier"=>123456789,"email"=>"vivienne74@example.com","limit_issue_date"=>date('Y-m-d', strtotime("2018-11-10 00:00:00". ' + 90 days')),"authorization_number"=>"798347","idCompany"=>1,"id_payment"=>5],

        ];

        DB::table('bill')->insert($bill);
        DB::table('detalle_fac')->insert($detalle_factura);

        $m = [["date_created"=>Carbon::now(), "date_end"=>Carbon::now(), "name"=>"menu1", "status"=>"activo", "id_user"=>4],
              ["date_created"=>Carbon::now(), "date_end"=>Carbon::now(), "name"=>"menu2", "status"=>"activo", "id_user"=>4]];
        DB::table('menu')->insert($m);

        $d = [["name"=>"dish1", "description"=>"dd1", "portion"=>2,"date_created"=>Carbon::now(), "images"=>"Captura de pantalla 2018-11-21 a la(s) 23.16.32.png", "status"=>"activo", "type"=>"tipo", "tip"=>"tip", "id_user"=>4],
            ["name"=>"dish12", "description"=>"dd12", "portion"=>2,"date_created"=>Carbon::now(), "images"=>"Captura de pantalla 2018-11-21 a la(s) 23.16.32.png", "status"=>"activo", "type"=>"tipo", "tip"=>"tip", "id_user"=>4]];
        DB::table('dish')->insert($d);

        $md = [["date_start"=>now()->addDay(-7), "date_end"=>now()->addDay(7), "id_menu"=>1, "id_dish"=>1, "status"=>"activo"],
            ["date_start"=>now()->addDay(-7), "date_end"=>now()->addDay(7), "id_menu"=>2, "id_dish"=>2, "status"=>"activo"]];
        DB::table('menu_dish')->insert($md);

    }
}
