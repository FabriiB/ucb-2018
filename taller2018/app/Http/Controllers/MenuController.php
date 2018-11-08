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
                ->join('menu_dish','menu.id_menu', '=', 'menu_dish.id_menu')
                ->join('dish','menu_dish.id_dish', '=', 'dish.idDish')
                ->join('administrator','menu.id_administrator', '=', 'administrator.id_administrator')
                ->select('menu.id_menu', 'menu.name', 'menu.status','menu_dish.id_menu as dish', 'dish.idDish as id_dish', 'dish.name as dd', 'dish.status as ds', 'administrator.name as an', 'menu.date_created as dc')
                ->where('menu.id_menu', 'LIKE', '%' . $query . '%')
                ->orwhere('menu.name', 'LIKE', '%' . $query . '%')
                ->orderBy('menu.id_menu')
                ->get();
            return view('menu.index', ["menu" => $menu, "searchText" => $query]);
        }
    }

    public function create()
    {
        $id_ad = DB::table('administrator')
            ->select('id_administrator', 'name')
            ->get();
        return view('menu.create', ['id_ad' => $id_ad]);
    }
    public function store(MenuRequest $request)
    {
        //echo "<script>alert('entro al store');</script>";
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $menu                    = new Menu;
        $menu->date_created      = $tfecha->format('Y-m-d H:i:s');
        $menu->date_update       = $tfecha->format('Y-m-d H:i:s');
        $menu->name              = $request->get('name');
        $menu->status            = 'active';
        $menu->id_administrator  = $request->get('id_administrator');
        $menu->transaction_id    = $tid;
        $menu->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $menu->transaction_host  = $ip;
        $menu->transaction_user  = $request->get('id_administrator');
        $menu->save();
/*
        $idm='1';

        $menudish                    = new MenuDish;
        $menudish->date_start        = $request->get('date_start');
        $menudish->date_end          = $request->get('date_menu');
        $menudish->id_menu           = $request->get('name');
        $menudish->id_dish           = $idm;
        $menudish->transaction_id    = $tid;
        $menudish->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $menudish->transaction_host  = $ip;
        $menudish->transaction_user  = $request->get('id_administrator');
        $menudish->save();*/


        return redirect()->action('MenuController@index');
    }

    public function show($id)
    {
        return view("Recipe.show", ["recipe" => Recipe::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Recipe.edit", ["recipe" => Recipe::findOrfail($id)]);
    }

    public function update(RecipeRequest $request, $id)
    {
        $Recipe                     = Recipe::findOrFail($id);
        $Recipe->id_dish           = $request->get('dish');
        $Recipe->id_administrator  = $request->get('administrator');
        $Recipe ->description       = $request->get('description');
        $Recipe ->ingredients       = $request->get('ingredients');
        $Recipe->update();
        //return Redirect::to('/recipe');
        return redirect()->action('RecipeController@index');
    }
    public function destroy($id)
    {
        $propietario = Recipe::findOrfail($id);
        $propietario->delete();
        //return Redirect::to('/recipe');
        return redirect()->action('RecipeController@index');
    }
}
