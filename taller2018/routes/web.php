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
    Route::get('/depts/{id}','HomeController@deptsId');
}));


Route::post('order/create', 'OrderController@create');
Route::get('order/destroy/{id}', 'OrderController@destroy');
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
Route::get('menu/{id}/cambiar', 'MenuController@cambiar');
Route::get('factura', 'facturacontroller@index');

Route::resource('ListadoPedidos','ListaPedidosController');
Route::get('ListadoPedidos.filtro', [
    'as' => 'filtro',
    'uses' => 'ListaPedidosController@filtro'
]);
//Route::get('ListadoPedidos.update', [
//    'as' => 'update',
//    'uses' => 'ListaPedidosController@update'
//]);
//
Route::post('ListadoPedidos', [
    'as' => 'fecha',
    'uses' => 'ListaPedidosController@filtroFecha'
]);
Route::post('ListadoPedidos', [
    'as' => 'nombre',
    'uses' => 'ListaPedidosController@filtroNombre'
]);
Route::post('ListadoPedidos', [
    'as' => 'estado',
    'uses' => 'ListaPedidosController@filtroEstado'
]);

Route::resource('meassure', 'MeassureController');
Route::get('ingredientes/create', 'IngredientsController@create');

Route::resource('meassure', 'MeassureController');
Route::get('ingredientes/create', 'IngredientsController@create');

//Route::post('order/create', 'OrderController@create');
Route::resource('pedidos', 'OrderController');

Route::resource('ingredients', 'IngredientsController');
Route::get('ingredients/{id}/cambiar', 'IngredientsController@cambiar');
Route::resource('instructions', 'InstructionsController');
Route::resource('dish', 'PlatosController');
Route::resource('drink', 'DrinkController');
Route::get('drink/{id}/cambiar', 'DrinkController@cambiar');
Route::resource('steps', 'StepsController');
Route::get('steps/{id}/edit', 'StepsController@edit');
Route::get('steps/{id}/cambiar', 'StepsController@cambiar');
Route::get('platos/create', 'PlatosController@create');
Route::resource('/menu_dish', 'MenuDishController');
Route::get('menu_dish/{id}/create', 'MenuDishController@create');
Route::get('menu_dish/{id}/index', 'MenuDishController@index');
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('/qrcode', 'QrController@make');
Route::resource('/dish_ingredients', 'DishIngredientsController');
Route::get('dish_ingredients/{id}/create', 'DishIngredientsController@create');
Route::get('dish_ingredients/{id}/index', 'DishIngredientsController@index');
Route::get('dish_ingredients/{id}/edit', 'DishIngredientsController@edit');
Route::get('dish_ingredients/{id}/cambiar', 'DishIngredientsController@cambiar');

Route::resource('/menugeneral', 'MenuGeneralController');
Route::get('menugeneral/{id}/historial', 'MenuGeneralController@historial');
Route::get('/download-pdf/{id}', 'facturacontroller@downloadPDF');


//Security routing
Route::group(["middleware" => 'entryrodrigo'], function () {
    Route::resource('pedidos1','ListaPedidosController');
    Route::resource('pedidos','ListaPedidosController');
    Route::post ('pedidos/filtro','ListaPedidosController@filtro');
});

Route::group(["middleware" => 'entrybenji'], function () {

    Route::get('/factura', 'HomeController@factura');
    Route::get('lista_factura/{id}', 'facturacontroller@index')->name('factura.index');
    Route::get('/factura/{id}','facturacontroller@show')->name('factura.show');
});

Route::group(["middleware" => 'entryfabrisio'], function () {

});

Route::group(["middleware" => 'admin'], function () {
    Route::resource('pass','PassController');
    Route::resource('pass','PassController');
    Route::get ('/pass', 'PassController@index');
});


Route::get('/receta_c', array('as'=>'info', 'uses'=>'RecetaController@index'));
Route::post('/insert', array('as'=>'insert', 'uses'=>'RecetaController@insert'));


Route::get('/PassAssign', function () {
    return view('PassAssign');
});

Route::post('/pass','PassController@AddNewRole');
Route::post('/PassAssign','PassController@AssignRole');

Route::get('/qr/{id}',function($id){

    return QRCode::url("1"."|8435113|1|12/12/2018|20.0|339201600001329".$id)
        ->setSize(3)
        ->setMargin(2)
        ->png();
})->name('qr');


/*Route::group(["middleware" => 'admin'], function () {
    Route::resource('pass','PassController');
    Route::resource('pedidos','ListaPedidosController');
    Route::post ('/pass', 'PassController@ShowPermision');
});*/

/*Route::get('/pass', function () {
    return view('pass');
});*/