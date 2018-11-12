<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $ingredients = DB::table('ingredients')
                ->where('id_ingredients', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('quantity', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orwhere('id_meassure', 'LIKE', '%' . $query . '%')
                ->orwhere('id_dish', 'LIKE', '%' . $query . '%')
                ->orderBy('id_ingredients', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('ingredientes.index', ["ingredients" => $ingredients, "searchText" => $query]);
        }
    }
}
