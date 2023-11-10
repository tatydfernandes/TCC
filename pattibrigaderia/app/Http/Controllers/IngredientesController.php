<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredientes;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $ingredientes = Ingredientes::all();
        return view('precificador', compact('ingredientes'));
    }
    public function indexjson()
    {        
        $ingredientes = Ingredientes::all();
        return $ingredientes;
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
        $ingredientes = new Ingredientes();

        $ingredientes->Ingrediente = $request->txIngrediente;
        $ingredientes->quantidade = $request->txQuantidade;
        $ingredientes->custo = $request->txCusto;

        $ingredientes->save();

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
        Ingredientes::where('idIngredientes',$id)->delete();
        return redirect('precificador');
    }

}
