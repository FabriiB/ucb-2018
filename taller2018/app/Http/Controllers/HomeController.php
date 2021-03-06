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
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Controla la cantidad de platos que puede pedir dependiendo el dia


        $results = DB::select(DB::raw("SELECT to_char(DATE '".now()->format('Y-m-d')."','day')"));
        if($results[0]->to_char === 'monday   '){
            $order_delivery = now()->addDay(3)->format('Y-m-d');
            $max = 4;
        }elseif ($results[0]->to_char === 'tuesday  '){
            $order_delivery = now()->addDay(2)->format('Y-m-d');
            $max = 4;
        }elseif ($results[0]->to_char === 'wednesday'){
            $order_delivery = now()->addDay(1)->format('Y-m-d');
            $max = 4;
        }elseif ($results[0]->to_char === 'thursday '){
            $order_delivery = now()->addDay(4)->format('Y-m-d');
            $max = 3;
        }elseif ($results[0]->to_char === 'friday   '){
            $order_delivery = now()->addDay(3)->format('Y-m-d');
            $max = 3;
        }elseif ($results[0]->to_char === 'saturday '){
            $order_delivery = now()->addDay(2)->format('Y-m-d');
            $max = 3;
        }elseif ($results[0]->to_char === 'sunday   '){
            $order_delivery = now()->addDay(1)->format('Y-m-d');
            $max = 3;
        }


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


        // Si no existiese un person no hace el quilombo de querys

        if($person === null){
            $plan = null;
            $ordenes = null;
        }else{

            $ordenes = DB::table('order')
                ->join('menu_dish', 'order.id_menu_dish','=','menu_dish.id_menu_dish')
                ->join('dish','dish.id_dish','=','menu_dish.id_dish')
                ->where('order.id_person','=',$person)
                ->where('order.status','=','En proceso')
                ->select('menu_dish.id_dish as dish','order.idOrder as id','dish.images as images','dish.name as name','menu_dish.id_menu_dish as iddish')
                ->get();

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
                ->select('dish.name as dish','menu_dish.id_menu_dish as id', 'dish.images as images')
                ->get();

        }

        //Encuentra los datos del user logueado

        $user = User::findOrFail($id);

        //No me acuerdo pero es importante creo

        $order_table = DB::table('order')
            ->select('orderDate', 'status')
            ->get();

        return view('home.home',compact('user', 'order_table','plan','ordenes','person','pedido','order_delivery','max'));
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
            ->select('name','id')
            ->where('catalogue_id','=',1)
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
        return view('home.planes',compact('user','plan','person','paises'));
    }

    public function deptsId($id){
        $depts = DB::table('items')
            ->select('name')
            ->where('boss_id','=',$id)
            ->orderBy('name')
            ->get();
        return response()->json($depts);
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
