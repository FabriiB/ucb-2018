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
}
