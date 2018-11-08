<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests\RecipeRequest;
use Illuminate\Routing\Redirector;
use App\Recipe;


class RecipeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    //Primera vista en pantalla al ingresar
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $pedido = DB::table('recipe')
                ->select('id_recipe', 'description', 'ingredients', 'id_dish','id_administrator')
                ->where('id_recipe', 'LIKE', '%' . $query . '%')
                ->orwhere('description', 'LIKE', '%' . $query . '%')
                ->orwhere('ingredients', 'LIKE', '%' . $query . '%')
                ->orderBy('id_recipe', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('Recipe.index', ["Recipe" => $recipe, "searchText" => $query]);
        }
    }

    //return view('Recipe.index',compact('recipe'), "searchText" => $query);
    //["Recipe" => $recipe, "searchText" => $query]);

    public function create()
    {
        $id_ad = DB::table('administrator')
            ->select('id_administrator', 'name')
            ->get();
        $id_dish = DB::table('dish')
            ->select('idDish', 'name')
            ->get();
        //echo "<script>alert('sale del create');</script>";
        return view('Recipe.create', ['id_ad' => $id_ad, 'id_dish'=> $id_dish]);
    }
    //Registra los datos ingresados
    public function store(RecipeRequest $request)
    {
        //echo "<script>alert('entro al store');</script>";
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $Recipe                    = new Recipe;
        $Recipe->description       = $request->get('description');
        $Recipe->ingredients       = $request->get('ingredients');
        $Recipe->id_dish           = $request->get('dish');
        $Recipe->id_administrator  = $request->get('administrator');
        $Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');
        $Recipe->save();
        //echo "<script>alert('salio del store');</script>";
        //return Redirect::to('/recipe');
        //return redirect()->route('/recipe');
        return redirect()->action('RecipeController@index');
    }

    public function show($id)
    {
        return view("Recipe.show", ["recipe" => Recipe::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Recipe.edit", ["recipe" => Recipe::findOrfail($id)]);
    }

    public function update(RecipeRequest $request, $id)
    {
        $Recipe                     = Recipe::findOrFail($id);
        $Recipe->id_dish           = $request->get('dish');
        $Recipe->id_administrator  = $request->get('administrator');
        $Recipe ->description       = $request->get('description');
        $Recipe ->ingredients       = $request->get('ingredients');
        $Recipe->update();
        //return Redirect::to('/recipe');
        return redirect()->action('RecipeController@index');
    }
    public function destroy($id)
    {
        $propietario = Recipe::findOrfail($id);
        $propietario->delete();
        //return Redirect::to('/recipe');
        return redirect()->action('RecipeController@index');
    }
}
