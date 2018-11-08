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
                ->select('menu.id_menu', 'menu_dish.id_menu as dish')
                ->orderBy('menu.id_menu')
            ->get();
            return view('menu.index', ["menu" => $menu, "searchText" => $query]);
        }
        //return view('menu.index');
    }
/*
    //return view('Recipe.index',compact('recipe'), "searchText" => $query);
    //["Recipe" => $recipe, "searchText" => $query]);

    public function create()
    {
        $id_ad = DB::table('administrator')
            ->select('id_administrator', 'name')
            ->get();
        $id_dish = DB::table('dish')
            ->select('idDish', 'name')
            ->get();
        //echo "<script>alert('sale del create');</script>";
        return view('Recipe.create', ['id_ad' => $id_ad, 'id_dish'=> $id_dish]);
    }
    //Registra los datos ingresados
    public function store(RecipeRequest $request)
    {
        //echo "<script>alert('entro al store');</script>";
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $Recipe                    = new Recipe;
        $Recipe->description       = $request->get('description');
        $Recipe->ingredients       = $request->get('ingredients');
        $Recipe->id_dish           = $request->get('dish');
        $Recipe->id_administrator  = $request->get('administrator');
        $Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');
        $Recipe->save();
        //echo "<script>alert('salio del store');</script>";
        //return Redirect::to('/recipe');
        //return redirect()->route('/recipe');
        return redirect()->action('RecipeController@index');
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
    }*/
}
