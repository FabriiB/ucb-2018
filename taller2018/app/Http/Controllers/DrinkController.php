<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Http\Requests\DrinkRequest;
use Carbon\Carbon;
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
            $drink = DB::table('drink')
                ->join('meassure', 'drink.id_meassure', '=', 'meassure.id_meassure')
                ->select('drink.*', 'meassure.name as mn')
                ->where('drink.id_drink', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.name', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.type', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.status', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.id_meassure', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.id_user', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.description', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.caducity_date', 'LIKE', '%' . $query . '%')
                ->orwhere('drink.packaging_date', 'LIKE', '%' . $query . '%')
                ->orderBy('drink.id_drink', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('drink.index', ["drink" => $drink, "searchText" => $query]);
        }
    }
    public function create()
    {
        $meassure = DB::table('meassure')
            ->select('id_meassure', 'name')
            ->orderBy('id_meassure', 'asc')
            ->get();
        return view('drink.create', ["meassure" => $meassure]);
    }
    public function store(DrinkRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $ingredients       = new Drink;
        $ingredients->name = $request->get('name');
        $ingredients->description = $request->get('description');
        $ingredients->caducity_date = $request->get('caducity_date');
        $ingredients->packaging_date = $request->get('packaging_date');
        $ingredients->type = $request->get('type');
        $ingredients->date_created = $tfecha->format('Y-m-d H:i:s');
        $ingredients->id_meassure = $request->get('id_meassure');
        $ingredients->status = 'activo';
        $ingredients->id_user = '1';
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $ingredients->save();
        return redirect()->action('DrinkController@index');
    }
    public function show($id)
    {
        return view("drink.show", ["meassure" => Drink::findOrFail($id)]);
    }
    public function edit($id)
    {
        $meassure = DB::table('meassure')
            ->select('id_meassure', 'name')
            ->orderBy('id_meassure', 'asc')
            ->get();
        return view("drink.edit", ["drink" => Drink::findOrfail($id) , "meassure" => $meassure]);
    }
    public function update(DrinkRequest $request, $id)
    {
        $meassure       = Drink::findOrFail($id);
        $meassure->name = $request->get('name');
        $meassure->description = $request->get('description');
        $meassure->type = $request->get('type');
        $meassure->update();
        return redirect()->action('DrinkController@index');
    }
}
