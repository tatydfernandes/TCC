<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        return view('gerenciarClientes', compact('cliente'));
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
        $cliente = new Cliente();
        $cliente->cliente = $request->input('txNomeCliente');
        $cliente->celular = $request->input('txCelularCliente');
        $cliente->cep = $request->input('txCepCliente');
        $cliente->municipio = $request->input('txMunicipioCliente');
        $cliente->logradouro = $request->input('txLogradouroCliente');
        $cliente->bairro = $request->input('txBairroCliente');
        $cliente->complemento = $request->input('txComplementoCsCliente');
        $cliente->numero = $request->input('txNumeroCsCliente');
        $cliente->email = $request->input('txEmailCliente');
        $cliente->save();
        return redirect('/gerenciarClientes');
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
        Cliente::where('idCliente',$id)->delete();
        return redirect('gerenciarClientes');
    }
}
