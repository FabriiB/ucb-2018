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

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/recipe', 'RecipeController');
//Route::resource('/recipe/create', 'RecipeController@create');

Route::get('recipe/create', 'RecipeController@create');

Route::get('/usuarios', 'UserController@index');
Route::delete('/usuarios/{id}', 'UserController@destroy');

Route::get('/users/month_order, MonthOrderController');

