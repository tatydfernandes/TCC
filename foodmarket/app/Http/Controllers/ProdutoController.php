<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $produto = Produto::all();
        return view('vender', compact('produto'));
    }
    public function indexLista()
    {
        $produto = Produto::all();
        return view('lista-produtos', compact('produto'));
    }
    public function indexjson()
    {        
        $produto = Produto::all();
        return $produto;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $produto = new Produto();
    $produto->produto = $request->input('txNomeProduto');
    $produto->descricao = $request->input('txDescrProduto');
    $produto->categoria = $request->input('txCategoria');
    $produto->valor_unitario = $request->input('txValorSProduto');
    $produto->valor_venda = $request->input('txValorVProduto');

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $extension = $request->image->extension();
        $imageName = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $request->image->move(public_path('img/produtos'), $imageName);
        $produto->foto = $imageName;
    }

    $produto->save();
    return redirect('/precificador');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto-editar', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
