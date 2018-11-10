<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MeassureRequest;
use App\Meassure;

class MeassureController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $meassure = DB::table('meassure')
                ->where('id_meassure', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orderBy('id_meassure', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('meassure.index', ["meassure" => $meassure, "searchText" => $query]);
        }
    }
    public function create()
    {
        //echo "<script>alert('sale del create');</script>";
        return view('meassure.create');
    }
    //Registra los datos ingresados
    public function store(RecipeRequest $request)
    {
        //echo "<script>alert('entro al store');</script>";
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $meassure                    = new Recipe;
        $meassure->unit       = $request->get('unit');
        $meassure->name       = $request->get('name');
        $meassure->type           = $request->get('type');
        $meassure->transaction_id    = $tid;
        $meassure->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $meassure->transaction_host  = $ip;
        $meassure->transaction_user  = $request->get('administrator');
        $meassure->save();
        //echo "<script>alert('salio del store');</script>";
        return redirect()->action('MeassureController@index');
    }
}
