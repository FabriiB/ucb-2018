<?php

namespace App\Http\Controllers;

use App\Dish;
use App\DishIngredients;
use App\Http\Requests\DishIngredientsRequest;
use App\Http\Requests\DishRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishIngredientsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request, $id)
    {
        $ing = DB::table('dish')
            ->join('dish_ingredients', 'dish.id_dish', '=', 'dish_ingredients.id_dish')
            ->join('ingredients', 'dish_ingredients.id_ingredients','=', 'ingredients.id_ingredients')
            ->where('dish_ingredients.id_dish','=', $id)
            ->get();
        $s = DB::table('steps')
            ->join('dish', 'steps.id_dish', '=', 'dish.id_dish')
            ->where('dish.id_dish','=', $id)
            ->get();
        return view('dish_ingredients.index', ["dish" => Dish::findOrFail($id), "ing" => $ing, "s"=>$s]);
    }
    public function create($id)
    {
        $dish = DB::table('ingredients')
            ->select('id_ingredients', 'name')
            ->where('status','=', 'activo')
            -> get();
        return view('dish_ingredients.create', ["menu" => Dish::findOrFail($id), "dish" =>$dish]);
    }
    public function store(DishIngredientsRequest $request)
    {
        $id_menu = DB::table('dish')
            ->select('id_dish', 'name')
            ->where('name', '=', $request->get('dish_name'))
            ->first();
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $di       = new DishIngredients;
        $di->quantity= $request->get('quantity');
        $di->date_created = $tfecha->format('Y-m-d H:i:s');
        $di->id_ingredients= $request->get('id_ingredient');
        $di->id_dish=$id_menu->id_dish;
        $di->save();

        return redirect()->action('PlatosController@index');
    }
    public function show()
    {
        return view('dish_ingredients.create');
    }
    public function update(DishRequest $request, $id)
    {
        $meassure       = Dish::findOrFail($id);
        $meassure->name = $request->get('name');
        $meassure->description = $request->get('description');
        $meassure->type = $request->get('type');
        $meassure->portion = $request->get('portion');
        $meassure->update();
        return redirect()->action('PlatosController@index');
    }
    public function cambiar($id)
    {
        $ingredients       = Dish::findOrFail($id);
        if($ingredients->status == 'activo')
        {
            $ingredients->status = 'no actvo';
        }
        else
        {
            $ingredients->status = 'activo';
        }
        $ingredients->update();
        return redirect()->action('PlatosController@index');
    }
}
