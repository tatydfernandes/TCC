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

Route::get('login',array('as'=>'login',function(){
    return view('login');
}));

Route::post('/usuario','Auth\RegisterController@store');

Route::post('login','Auth\RegisterController@verifyUser');

Route::get('/logout','Auth\RegisterController@logoutUser');

Route::get('/usuario', function () {
    return view('usuario');
});

Route::get('/', function () {
    return view('vender');
})->middleware('auth');





/* OUTRAS ROTAS */


Route::get('precificador', function () {
    return view('precificador');
})->middleware('auth');
Route::get('lista-produtos', function () {
    return view('lista-produtos');
})->middleware('auth');
Route::get('gerenciarClientes', function () {
    return view('gerenciarClientes');
})->middleware('auth');
Route::get('lista-clientes', function () {
    return view('lista-clientes');
})->middleware('auth');
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::get('precificador', 'IngredientesController@index')->middleware('auth');

Route::get('/', 'ProdutoController@index')->middleware('auth');
Route::get('vender', 'ProdutoController@index')->middleware('auth');


Route::get('lista-clientes', 'ClienteController@index')->middleware('auth');
Route::get('dashboard', 'VendaController@index')->middleware('auth');
Route::get('lista-produtos', 'ProdutoController@indexLista')->name('lista-produtos')->middleware('auth');



Route::post('ingrediente', 'IngredientesController@store')->middleware('auth');
Route::post('Produto', 'ProdutoController@store')->middleware('auth');
Route::post('Cliente', 'ClienteController@store')->middleware('auth');
Route::post('Venda', 'VendaController@store')->middleware('auth');


Route::get('/precificador/excluir/{id}', 'IngredientesController@destroy')->middleware('auth');

Route::get('/lista-produtos/excluir/{id}', 'ProdutoController@destroy')->middleware('auth');
Route::get('/produto/editar/{id}', 'ProdutoController@edit')->middleware('auth');
Route::put('/produto/{id}', 'ProdutoController@update')->middleware('auth');

Route::get('/gerenciarClientes/excluir/{id}', 'ClienteController@destroy')->middleware('auth');
Route::get('/cliente/editar/{id}', 'ClienteController@edit')->middleware('auth');
Route::put('/cliente/{id}', 'ClienteController@update')->middleware('auth');


Route::get('/vender/{id}/edit', 'VendaController@edit')->name('venda.edit')->middleware('auth');
Route::put('/venda/{id}', 'VendaController@updateStatus')->name('venda.update')->middleware('auth');






