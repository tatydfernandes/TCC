<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Cliente;
use App\FPagamento;
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
        $produtos = Produto::all();
        $produtosPorCategoria = $produtos->groupBy('categoria');


        $cliente = Cliente::all();
        $fpagamento = FPagamento::all();
        return view('vender', compact('produtosPorCategoria','cliente', 'fpagamento'));
    }
    public function indexLista()
    {
        $produto = Produto::all();
        return view('lista-produtos', compact('produto'));
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
        $produto = Produto::find($id);
        return view('editarProduto', compact('produto'));
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
        $produto = Produto::find($id);

        if (!$produto) {
            // Produto não encontrado, você pode redirecionar ou lidar com isso de outra forma
            return redirect('/lista-produtos')->with('error', 'Produto não encontrado');
        }

        $produto->produto = $request->input('txNomeProduto');
        $produto->descricao = $request->input('txDescrProduto');
        $produto->categoria = $request->input('txCategoria');
        $produto->valor_unitario = $request->input('txValorSProduto');
        $produto->valor_venda = $request->input('txValorVProduto');

        // Verificar se uma nova imagem foi enviada
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Excluir a imagem anterior (se existir)
            if ($produto->foto) {
                Storage::delete('img/produtos/' . $produto->foto);
            }

            // Salvar a nova imagem
            $extension = $request->image->extension();
            $imageName = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/produtos'), $imageName);
            $produto->foto = $imageName;
        }

        $produto->save();

        return redirect('/lista-produtos')->with('success', 'Produto atualizado com sucesso');
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
        Produto::where('idProduto',$id)->delete();
        return redirect('lista-produtos');
    }



    /**  FUNÇÕES API  **/
    
    
    public function indexApi()
    {        
        $produto = Produto::all();
        return $produto;
    }






}
