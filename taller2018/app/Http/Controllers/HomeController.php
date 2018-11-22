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
        $id = Auth::id();
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

        if($person === null){
            $plan = null;
            $ordenes = null;
        }else{

            $ordenes = DB::table('order')
                ->join('menu_dish', 'order.id_menu_dish','=','menu_dish.id_menu_dish')
                ->where('order.id_person','=',$person)
                ->select('menu_dish.id_dish as dish')
                ->pluck('dish');


            $dish = DB::table('dish')
                ->whereIn('id_dish',$ordenes)
                ->pluck('name');

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


        $user = User::findOrFail($id);
        $order_table = DB::table('order')
            ->select('orderDate', 'status')
            ->get();
        return view('home.home',compact('user', 'order_table','plan','dish','pedido','person'));
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
        $id = Auth::id();
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
        return view('home.planes',compact('user','plan','person'));
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
