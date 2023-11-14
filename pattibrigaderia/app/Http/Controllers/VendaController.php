<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Venda;
use App\Carrinho;
use App\Cliente;
use App\Usuario;
use App\Produto;
use App\FPagamento;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = DB::table('tbVenda')
            ->join('tbCliente', 'tbVenda.idCliente', '=', 'tbCliente.idCliente')
            ->join('tbFPagamento', 'tbVenda.idFPagamento', '=', 'tbFPagamento.idFPagamento')
            ->select('tbVenda.*', 'tbCliente.cliente', 'tbFPagamento.fPagamento')
            ->get();

        return view('dashboard', compact('vendas'));
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
    // Validação dos dados
    $this->validate($request, [
        'txVendaCliente' => 'required',
        'txTVenda' => 'required',
        'txDataPed' => 'required',
        'txDataEnt' => 'required',
        'txStatus' => 'required',
        'txTotalDaVenda' => 'required',
        'txIdProduto' => 'required|array',
        'txQtd' => 'required|array',
        'txTotalProduto' => 'required|array',
    ]);

    // Inicia uma transação no banco de dados
    DB::beginTransaction();

    try {
        // Cria um novo registro de venda
        $venda = new Venda([
            'idCliente' => $request->input('txVendaCliente'),
            'tpVenda' => $request->input('txTVenda'),
            'dtVenda' => $request->input('txDataPed'),
            'dtEntrega' => $request->input('txDataEnt'),
            'totalVenda' => floatval(str_replace(',', '.', str_replace('R$', '', $request->input('txTotalDaVenda')))),
            'status' => $request->input('txStatus'),
            'idFPagamento' => $request->input('txFPagamento'), 
        ]);
        $venda->save();

        $idVenda = $venda->id;

        $idProdutos = $request->input('txIdProduto');
        $qtdProdutos = $request->input('txQtd');
        $valorProdutos = $request->input('txTotalProduto');
        $txValorUnitario = $request->input('txValorVenda');

        // Itera sobre os produtos e associa-os à venda
        for ($i = 0; $i < count($idProdutos); $i++) {
            $vendaProduto = new Carrinho([
                'idVenda' => $idVenda,  // Certifique-se de que $idVenda está definido
                'idProduto' => $idProdutos[$i],
                'valor_unitario' => floatval(str_replace(',', '.', str_replace("R$", "", $txValorUnitario[$i]))),
                'qtd' => $qtdProdutos[$i],
                'valor_total' => floatval(str_replace(',', '.', str_replace("R$", "", $valorProdutos[$i])))
            ]);

            // Associa o item de carrinho à venda
            $venda->itensDeCarrinho()->save($vendaProduto);
        }

        // Commit da transação se tudo estiver bem
        DB::commit();

        return redirect('/vender')->with('success', 'Venda registrada com sucesso!');
    } catch (\Exception $e) {
        // Reverte a transação em caso de erro
        DB::rollBack();

        // Tratamento de erro
        throw new \Exception('Erro ao processar a venda. ' . $e->getMessage());
    }
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
