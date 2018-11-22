<?php

namespace App\Http\Controllers;

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
                ->where('id_menu', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orwhere('date_created', 'LIKE', '%' . $query . '%')
                ->orwhere('date_end', 'LIKE', '%' . $query . '%')
                ->orwhere('id_user', 'LIKE', '%' . $query . '%')
                ->orderBy('id_menu', 'desc')
                ->paginate(5);
            return view('menu.index', ["menu" => $menu, "searchText" => $query]);
        }
    }
    public function create()
    {
        //echo '<script type="text/javascript">alert("hello!");</script>';
        return view('menu.create');
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
        $menu->save();
        return redirect()->action('MenuDishController@create', ["menu" => $menu->id_menu]);
    }
    /*public function first(MenuRequest $request)
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
   /*     $menu->save();

        $user= Menu::all();
        $id = var_dump($user->last());

        $dish = DB::table('dish')
            ->select('id_dish', 'name')
            -> get();
        return view('menu_dish.create', ["menu" => Menu::findOrFail($id), "dish" =>$dish]);

    }*/
    public function show()
    {
        return view('menu_dish.create');
    }
}
