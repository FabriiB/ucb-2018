<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use App\Ingredients;
use App\DishIngredients;
use App\Steps;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    public function index()
    {
        $ingrediente = DB::table('ingredients')
            ->select('id_ingredients', 'name')
            ->get();
        return view('Receta_c.info', compact('ingrediente'));
    }
    public function insert(Request $request)
    {
        $tfecha = Carbon::now();
        $dish = new Dish;
        $dish->name = $request->nombre;
        $dish->description = $request->descripcion;
        $dish->portion = $request->porcion;
        $dish->type = $request->tipo;
        $dish->date_created = $tfecha->format('Y-m-d H:i:s');
        $dish->images = 'images';
        $dish->status = 'activo';
        $dish->id_user = '1';
        $id = $dish->save();
        $id_diiii = $dish->id_dish;
        if($id !=0){
            foreach ($request->ingrediente as $key => $i)
            {
                $data = array('id_dish'=>$id_diiii,
                              'id_ingredients' => $i,
                              'quantity' => $request->cantidad [$key],
                              'date_created' => $tfecha->format('Y-m-d H:i:s'));
                DishIngredients::insert($data);
            }
        }
        return redirect()->action('MenuController@index');
    }
    public function edit()
    {
        return view('Receta_c.update');
    }
    public function update()
    {

    }
}
