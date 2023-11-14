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



/*ROTAS NORMAIS*/
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
Route::get('gerenciarClientes', function () {
    return view('gerenciarClientes');
});
Route::get('dashboard', function () {
    return view('dashboard');
});



Route::get('precificador', 'IngredientesController@index');
Route::get('vender', 'ProdutoController@index');
Route::get('gerenciarClientes', 'ClienteController@index');
Route::get('dashboard', 'VendaController@index');
Route::get('lista-produtos', 'ProdutoController@indexLista')->name('lista-produtos');



Route::post('ingrediente', 'IngredientesController@store');
Route::post('Produto', 'ProdutoController@store');
Route::post('Cliente', 'ClienteController@store');
Route::post('Venda', 'VendaController@store');


Route::get('/precificador/excluir/{id}', 'IngredientesController@destroy');
Route::get('/lista-produtos/excluir/{id}', 'ProdutoController@destroy');
Route::get('/gerenciarClientes/excluir/{id}', 'ClienteController@destroy');


Route::get('/produto-editar/editar/{id}', 'ProdutoController@show');
Route::put('Produto/{id}', 'ProdutoController@update')->name('produto.update');






