<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuGeneralController extends Controller
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
                ->orderBy('id_menu', 'desc')
                ->paginate(5);
            return view('menugeneral.index', ["menu" => $menu, "searchText" => $query]);
        }
    }
    public function historial($id)
    {
        $platos = DB::table('dish')
            ->select('dish.id_dish as id_dish', 'dish.name as dish_name', 'dish.images')
            ->join('menu_dish', 'dish.id_dish','=', 'menu_dish.id_dish')
            ->where('menu_dish.id_menu', '=', $id)
            ->orderBy('dish.id_dish', 'asc')
            ->get();
        $ingredientes = DB::table('ingredients')
            ->select('ingredients.name as iname', 'dish_ingredients.id_dish as idish')
            ->join('dish_ingredients', 'ingredients.id_ingredients', '=', 'dish_ingredients.id_ingredients')
            ->join('dish', 'dish_ingredients.id_dish', '=', 'dish.id_dish')
            ->join('menu_dish', 'dish.id_dish','=', 'menu_dish.id_dish')
            ->where('menu_dish.id_menu', '=', $id)
            ->orderBy('ingredients.id_ingredients', 'asc')
            ->get();
        $pasos = DB::table('steps')
            ->select('steps.title', 'steps.description', 'steps.id_dish')
            ->join('dish', 'steps.id_dish', '=', 'dish.id_dish')
            ->join('menu_dish', 'dish.id_dish','=', 'menu_dish.id_dish')
            ->where('menu_dish.id_menu', '=', $id)
            ->orderBy('steps.id_step', 'asc')
            ->get();
        return view('menugeneral.historial', ["menu"=>Menu::findOrFail($id), "platos"=>$platos, "ingredientes"=>$ingredientes, "pasos"=>$pasos]);
    }
}
