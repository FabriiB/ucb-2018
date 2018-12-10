<?php

namespace App\Http\Controllers;

use App\Ingredients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IngredientsRequest;

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
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orwhere('id_meassure', 'LIKE', '%' . $query . '%')
                ->orderBy('id_ingredients', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('ingredientes.index', ["ingredients" => $ingredients, "searchText" => $query]);
        }
    }
    public function create()
    {
        $meassure = DB::table('meassure')
            ->select('id_meassure', 'name')
            ->orderBy('id_meassure', 'asc')
            ->get();
        return view('ingredientes.create', ["meassure" => $meassure]);
    }
    public function store(IngredientsRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $ingredients       = new Ingredients;
        $ingredients->name = $request->get('name');
        $ingredients->date_created = $tfecha->format('Y-m-d H:i:s');
        $ingredients->type = $request->get('type');
        $ingredients->status = 'activo';
        $ingredients->id_meassure = $request->get('id_meassure');
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $ingredients->save();
        return redirect()->action('IngredientsController@index');
    }
    public function show()
    {
        return view("ingredientes.index");
    }
    public function edit($id)
    {
        $meassure = DB::table('meassure')
            ->select('id_meassure', 'name')
            ->orderBy('id_meassure', 'asc')
            ->get();
        return view("ingredientes.edit", ["ingredients" => Ingredients::findOrfail($id), "meassure" => $meassure]);
    }
    public function update(IngredientsRequest $request, $id)
    {
        $ingredients       = Ingredients::findOrFail($id);
        $ingredients->name = $request->get('name');
        $ingredients->type = $request->get('type');
        $ingredients->id_meassure = $request->get('id_meassure');
        $ingredients->update();
        return redirect()->action('IngredientsController@index');
    }
    public function cambiar($id)
    {
        $ingredients       = Ingredients::findOrFail($id);
        if($ingredients->status == 'activo')
        {
            $ingredients->status = 'no actvo';
        }
        else
        {
            $ingredients->status = 'activo';
        }
        $ingredients->update();
        return redirect()->action('IngredientsController@index');
    }

}
