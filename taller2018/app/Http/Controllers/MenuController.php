<?php

namespace App\Http\Controllers;

use App\DishDrink;
use Illuminate\Http\Request;
use Faker\Provider\DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests\MenuRequest;
use Illuminate\Routing\Redirector;
use App\Menu;
use App\MenuDish;
use NumeroALetras;

class MenuController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $menu = DB::table('menu')
                ->join('users','menu.id_user', '=', 'users.id')
                ->select('menu.*', 'users.firs_name as fn', 'users.last_name1 as ln')
                ->where('menu.id_menu', 'LIKE', '%' . $query . '%')
                ->orwhere('menu.name', 'LIKE', '%' . $query . '%')
                ->orwhere('menu.status', 'LIKE', '%' . $query . '%')
                ->orwhere('menu.date_created', 'LIKE', '%' . $query . '%')
                ->orwhere('menu.date_end', 'LIKE', '%' . $query . '%')
                ->orwhere('users.firs_name', 'LIKE', '%' . $query . '%')
                ->orwhere('users.last_name1', 'LIKE', '%' . $query . '%')
                ->orderBy('menu.id_menu', 'desc')
                ->paginate(5);
            return view('menu.index', ["menu" => $menu, "searchText" => $query]);
        }
    }
    public function create()
    {
        //echo '<script type="text/javascript">alert("hello!");</script>';
        $dish = DB::table('dish')
            ->select('id_dish', 'name')
            ->where('status', '=', 'activo')
            -> get();
        $drink = DB::table('drink')
            ->select('id_drink', 'name')
            ->where('status', '=', 'activo')
            -> get();
        return view('menu.create', ["dish" =>$dish, "drink"=>$drink]);
    }
    public function store(MenuRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $menu       = new Menu;
        $menu->name = $request->get('name');
        $menu->date_created = $request->get('date_created');
        $menu->date_end = $request->get('date_end');
        $menu->status = 'activo';
        $menu->id_user = '1';
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $id = $menu->save();
        $idd = $menu->id_menu;

        if($id !=0){
            foreach ($request->id_dish as $key => $i)
            {
                $data = array('id_menu'=>$idd,
                    'id_dish' => $i,
                    'date_start' => $request->get('date_created'),
                    'date_end' => $request->get('date_end'),
                    'status' => 'activo');
                MenuDish::insert($data);
            }

            foreach ($request->id_drink as $key => $t)
            {
                $data1 = array('id_menu'=>$idd,
                    'id_drink' => $t,
                    'status' => 'activo',
                    'date_created' => $tfecha->format('Y-m-d H:i:s'));
                DishDrink::insert($data1);
            }

        }
        return redirect()->action('MenuController@index');

    }
    public function show()
    {
        return view('menu.index');
    }
    public function cambiar($id)
    {
        $ingredients       = Menu::findOrFail($id);
        if($ingredients->status == 'activo')
        {
            $ingredients->status = 'no actvo';
        }
        else
        {
            $ingredients->status = 'activo';
        }
        $ingredients->update();
        return redirect()->action('MenuController@index');
    }
}
