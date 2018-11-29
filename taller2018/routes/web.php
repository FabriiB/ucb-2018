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
    Route::get('/', 'HomeController@index')->name('mi_cuenta');
    Route::get('/datos', 'HomeController@edit');
    Route::get('/plan/{plan}/{id}', 'HomeController@planes');
    Route::get('/historial', 'HomeController@historial');
    Route::get('/historial_planes', 'HomeController@historial2');
}));


Route::post('order/create', 'OrderController@create');
Route::post('person/create', 'PersonController@create');
Route::get('person/createPlan/{data}', 'PersonController@createNext');
//Route::resource('passports','PassportController');


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
Route::get('menu/create', 'MenuController@create');
Route::get('menu/first', 'MenuController@first');
Route::get('factura', 'facturacontroller@index');

Route::resource('ListadoPedidos','ListaPedidosController');


Route::resource('meassure', 'MeassureController');
Route::get('ingredientes/create', 'IngredientsController@create');
=======

Route::resource('meassure', 'MeassureController');
Route::get('ingredientes/create', 'IngredientsController@create');

Route::resource('ordera', 'OrderController');
Route::resource('ordera/create', 'OrderController@createa');
Route::get('ordera/create', 'OrderController@createa');
Route::post('order/create', 'OrderController@create');
Route::resource('pedidos', 'OrderController');
Route::resource('order', 'OrderController')->except([

]);

Route::resource('ingredients', 'IngredientsController');
Route::resource('instructions', 'InstructionsController');
Route::resource('dish', 'PlatosController');
Route::resource('drink', 'DrinkController');
Route::resource('steps', 'StepsController');
Route::get('platos/create', 'PlatosController@create');
Route::resource('/menu_dish', 'MenuDishController');
Route::get('menu_dish/{id}/create', 'MenuDishController@create');
Route::get('menu_dish/{id}/index', 'MenuDishController@index');
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('/qrcode', 'QrController@make');
Route::resource('/dish_ingredients', 'DishIngredientsController');
Route::get('dish_ingredients/{id}/create', 'DishIngredientsController@create');
Route::get('dish_ingredients/{id}/index', 'DishIngredientsController@index');

Route::resource('/menugeneral', 'MenuGeneralController');
Route::get('menugeneral/{id}/historial', 'MenuGeneralController@historial');
Route::get('/download-pdf', 'facturacontroller@downloadPDF');


//Security routing
Route::group(["middleware" => 'entryrodrigo'], function () {
    Route::resource('pedidos1','ListaPedidosController');
    Route::resource('pedidos','ListaPedidosController');
    Route::post ('pedidos/filtro','ListaPedidosController@filtro');
});

Route::group(["middleware" => 'entrybenji'], function () {
    Route::get('/factura', 'HomeController@factura');
    Route::get('factura', 'facturacontroller@index');
});

Route::group(["middleware" => 'entryfabrisio'], function () {

});




Route::get('/receta_c', array('as'=>'info', 'uses'=>'RecetaController@index'));
Route::post('/insert', array('as'=>'insert', 'uses'=>'RecetaController@insert'));
