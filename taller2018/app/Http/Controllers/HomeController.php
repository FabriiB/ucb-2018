<?php

namespace App\Http\Controllers;


use App\User;
use App\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        // Prueba si user tiene un person

        try {
            $person = DB::table('person')
                ->select('id_person')
                ->where('id_user','=',$id)
                ->first()
                ->id_person;
        }
        catch (\Exception $e) {
            $person=null;
        }


        // Controla la cantidad de platos que puede pedir dependiendo el dia

        $results = DB::select(DB::raw("SELECT to_char(DATE '".now()->format('Y-m-d')."', 'day')"));
        if($results[0]->to_char == 'monday'){
            $max = 4;
        }elseif ($results[0]->to_char == 'tuesday'){
            $max = 4;
        }elseif ($results[0]->to_char == 'wednesday'){
            $max = 4;
        }elseif ($results[0]->to_char == 'thursday'){
            $max = 3;
        }elseif ($results[0]->to_char == 'friday'){
            $max = 3;
        }elseif ($results[0]->to_char == 'saturday'){
            $max = 3;
        }elseif ($results[0]->to_char == 'sunday'){
            $max = 3;
        }



        // Si no existiese un person no hace el quilombo de querys

        if($person === null){
            $plan = null;
            $ordenes = null;
        }else{

            $ordenes = DB::table('order')
                ->join('menu_dish', 'order.id_menu_dish','=','menu_dish.id_menu_dish')
                ->where('order.id_person','=',$person)
                ->select('menu_dish.id_dish as dish')
                ->get();

            foreach ($ordenes as $orden)
            {
                $orden->dish = DB::table('dish')
                    ->where('id_dish','=',$orden->dish)
                    ->select('name')
                    ->first()
                    ->name;
            }

            $plan = DB::table('user_plan')
                ->join('person', 'user_plan.id_person','=','person.id_person')
                ->join('plan', 'user_plan.id_plan','=','plan.id_plan')
                ->where('start_date_plan', '<=', now())
                ->where('ending_date_plan', '>=',now())
                ->where('user_plan.id_person','=',$person)
                ->select('plan.type as type', 'user_plan.ending_date_plan as end', 'user_plan.id_plan as plan')
                ->first();

            $pedido = DB::table('menu_dish')
                ->join('dish', 'menu_dish.id_dish','=','dish.id_dish')
                ->where('date_start', '<=', now())
                ->where('date_end', '>=',now())
                ->select('dish.name as dish','menu_dish.id_dish as id')
                ->get();
        }

        //Encuentra los datos del user logueado

        $user = User::findOrFail($id);

        //No me acuerdo pero es importante creo

        $order_table = DB::table('order')
            ->select('orderDate', 'status')
            ->get();


        return view('home.home',compact('user', 'order_table','plan','ordenes','person','pedido','max'));
    }

    public function edit()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.edit',compact('user'));
    }

    public function factura()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.factura',compact('user'));
    }

    public function planes($planid,$id)
    {
        $paises = DB::table('items')
            ->select('name')
            ->where('catalogue_id','=',1)
            ->orderBy('name')
            ->get();

        $depts = DB::table('items')
            ->select('name')
            ->where('catalogue_id','=',2)
            ->where('level_id','=',1)
            ->orderBy('name')
            ->get();


        try {
            $person = DB::table('person')
                ->select('id_person')
                ->where('id_user','=',$id)
                ->first()
                ->id_person;
        }
        catch (\Exception $e) {
            $person=null;
        }
        $plan = Plan::findOrFail($planid);
        $user = User::findOrFail($id);
        return view('home.planes',compact('user','plan','person','paises','depts'));
    }

    public function historial()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.historial',compact('user'));
    }

    public function historial2()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.historial2',compact('user'));
    }

    public function admin()

    { return view('ListadoPedidos.index'); }
}
