<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatosController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $meassure = DB::table('dish')
                ->where('id_dish', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orwhere('description', 'LIKE', '%' . $query . '%')
                ->orderBy('id_dish', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('platos.index', ["meassure" => $meassure, "searchText" => $query]);
        }
    }
    public function create()
    {
        $meassure = DB::table('meassure')
            ->select('id_meassure', 'name')
            ->orderBy('id_meassure', 'asc')
            ->get();
        return view('platos.create', ["meassure" => $meassure]);
    }
    public function store(DishRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
/*
$profileImage = $request->file('imagen');
$profileImageSaveAsName = time() .
    $profileImage->getClientOriginalExtension();
$upload_path = 'storage/';
$profile_image_url =$profileImageSaveAsName;
$success = $profileImage->move($upload_path, $profileImageSaveAsName); */



        $tfecha = Carbon::now();
        $ingredients = new Dish;
        $ingredients->name = $request->get('name');
        $ingredients->description = $request->get('description');
        if ($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $ingredients->images = $name;
        }
        else
        {$ingredients->images = 'images';}
        $ingredients->portion = $request->get('porcion');;
        $ingredients->date_created = $tfecha->format('Y-m-d H:i:s');
        $ingredients->type = $request->get('type');
        $ingredients->status = 'activo';
        $ingredients->id_user = '1';
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $ingredients->save();
        return redirect()->action('DishIngredientsController@index', ["id" => $ingredients->id_dish]);
    }
}
