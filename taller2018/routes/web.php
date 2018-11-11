<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix'=>'mi_cuenta'],(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/datos', 'HomeController@edit');
    Route::get('/datos_factura', 'HomeController@index');
    Route::get('/historial', 'HomeController@index');
}));


Route::resource('passports','PassportController');


Route::resource('/recipe', 'RecipeController');
//Route::resource('/recipe/create', 'RecipeController@create');

Route::get('recipe/create', 'RecipeController@create');


Route::get('/usuarios', [
    'middleware' => 'auth',
    'uses' => 'UserController@index'
]);

Route::delete('usuarios/{id}', [
    'middleware' => 'auth',
    'uses' => 'UserController@destroy'
]);

Route::get('usuarios/{id}',function () {
    return view('welcome');
});

Route::resource('/menu', 'MenuController');

Route::get('factura', 'facturacontroller@index');

Route::resource('pedidos','ListaPedidosController');

Route::get('menu/create', 'MenuController@create');

Route::resource('order', 'OrderController');

