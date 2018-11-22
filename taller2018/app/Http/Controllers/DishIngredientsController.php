<?php

namespace App\Http\Controllers;

use App\Dish;
use App\DishIngredients;
use App\Http\Requests\DishIngredientsRequest;
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

        return view('dish_ingredients.index', ["dish" => Dish::findOrFail($id), "ing" => $ing]);
    }
    public function create($id)
    {
        $dish = DB::table('ingredients')
            ->select('id_ingredients', 'name')
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
}
