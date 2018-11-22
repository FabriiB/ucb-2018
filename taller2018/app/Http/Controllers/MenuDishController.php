<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuDishRequest;
use App\Menu;
use App\MenuDish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuDishController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request, $id)
    {
        $meassure = DB::table('dish')
            ->join('menu_dish', 'dish.id_dish', '=', 'menu_dish.id_dish')
            ->join('menu', 'menu_dish.id_menu','=', 'menu.id_menu')
            ->where('menu_dish.id_menu','=', $id)
            ->get();

        return view('menu_dish.index', ["menu" => Menu::findOrFail($id), "meassure" => $meassure]);
    }
    public function create($id)
    {
        $dish = DB::table('dish')
            ->select('id_dish', 'name')
            -> get();
        return view('menu_dish.create', ["menu" => Menu::findOrFail($id), "dish" =>$dish]);
    }
    public function store(MenuDishRequest $request)
    {
        $id_menu = DB::table('menu')
            ->select('id_menu', 'date_created', 'date_end')
            ->where('name', '=', $request->get('menu_name'))
            ->first();
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $menu       = new MenuDish;
        $menu->date_start = $id_menu->date_created;
        $menu->date_end = $id_menu->date_end;
        $menu->status = 'activo';
        $menu->id_menu = $id_menu->id_menu;
        $menu->id_dish = $request->get('id_dish');
        $menu->save();

        return redirect()->action('MenuController@index');
    }
    public function show()
    {
        return view('menu_dish.create');
    }
}
