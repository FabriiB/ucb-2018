<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinkController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $ingredients = DB::table('drink')
                ->where('id_drink', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orwhere('id_meassure', 'LIKE', '%' . $query . '%')
                ->orwhere('id_user', 'LIKE', '%' . $query . '%')
                ->orwhere('description', 'LIKE', '%' . $query . '%')
                ->orwhere('caducity_date', 'LIKE', '%' . $query . '%')
                ->orwhere('packaging_date', 'LIKE', '%' . $query . '%')
                ->orwhere('date_created', 'LIKE', '%' . $query . '%')
                ->orderBy('id_drink', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('drink.index', ["drink" => $ingredients, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view('drink.create');
    }
}
