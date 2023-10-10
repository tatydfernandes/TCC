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
Route::get('login', function () {
    return view('login');
});
Route::get('vender', function () {
    return view('vender');
});
Route::get('precificador', function () {
    return view('precificador');
});
Route::get('lista-produtos', function () {
    return view('lista-produtos');
});



Route::get('precificador', 'IngredientesController@index');
Route::get('vender', 'ProdutoController@index');
Route::get('lista-produtos', 'ProdutoController@indexLista');


Route::post('ingrediente', 'IngredientesController@store');
Route::post('Produto', 'ProdutoController@store');


Route::get('/precificador/excluir/{id}', 'IngredientesController@destroy');
Route::get('/lista-produtos/excluir/{id}', 'ProdutoController@destroy');


Route::get('/produto-editar/editar/{id}', 'ProdutoController@show');


Route::get('/lista-produtos/excluir/{id}', 'ProdutoController@update');


