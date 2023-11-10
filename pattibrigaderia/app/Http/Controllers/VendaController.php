<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $venda = Venda::all();
        return view('dashboard', compact('venda'));
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
     * 
     */
    public function store(Request $request)
{
    // Criar um novo registro de venda
    $venda = new Venda();
    $venda->idCliente = $request->input('txVendaCliente');
    $venda->tpVenda = $request->input('txTVenda');
    $venda->dtVenda = $request->input('txDataPed');
    $venda->dtEntrega = $request->input('txDataEnt');
    $venda->status = $request->input('txStatus');
    $venda->save();

    $idVenda = $venda->id;

    $idProdutos = $request->input('txIdProduto');
    $qtdProdutos = $request->input('txQtd');
    $valoresProdutos = $request->input('txTotalProduto');

    // Iterar pelos produtos e associá-los ao mesmo idVenda
    for ($i = 0; $i < count($idProdutos); $i++) {
        $vendaProduto = new Venda();
        $vendaProduto->idVenda = $idVenda;
        $vendaProduto->idProduto = $idProdutos[$i];
        $vendaProduto->qtdProduto = $qtdProdutos[$i];
        
        // Remover o símbolo "R$" e converter o valor em decimal
        $valorProduto = str_replace("R$", "", $valoresProdutos[$i]);
        $vendaProduto->valorTotalProduto = floatval($valorProduto);
        
        $vendaProduto->save();
    }

    return redirect('/vender');
}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
