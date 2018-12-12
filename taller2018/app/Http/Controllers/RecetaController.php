<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use App\Ingredients;
use App\DishIngredients;
use App\Steps;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DishRequest;
use App\Http\Requests\DishIngredientsRequest;

class RecetaController extends Controller
{
    public function index()
    {
        $ingrediente = DB::table('ingredients')
            ->select('id_ingredients', 'name')
            ->get();
        return view('Receta_c.info', compact('ingrediente'));
    }
    public function insert(Request $request, DishRequest $request1)
    {
        $tfecha = Carbon::now();
        $dish = new Dish;
        $dish->name = $request1->nombre;
        $dish->description = $request1->descripcion;
        $dish->portion = $request1->porcion;
        $dish->type = $request1->tipo;
        $dish->date_created = $tfecha->format('Y-m-d H:i:s');
        if ($request1->hasFile('imagen'))
        {
            $file = $request1->file('imagen');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $dish->images = $name;
        }
        else
        {
            $dish->images = 'images';
        }
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
            foreach ($request->titulo_p as $key => $t)
            {
                $data1 = array('id_dish'=>$id_diiii,
                               'title' => $request->titulo_p [$key],
                               'description' => $request->descripcion_p [$key],
                               'status' => 'activo',
                               'date_created' => $tfecha->format('Y-m-d H:i:s'));
                Steps::insert($data1);
            }

        }
        return redirect()->action('PlatosController@index');
    }
    public function edit()
    {
        return view('Receta_c.update');
    }
    public function update()
    {

    }
}
