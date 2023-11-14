@extends('layouts.layoutdefault')
@section('content')

<div class="vitrine">

    @foreach($produto as $p)
        <div class="box_exibidor_produto" data-product-id="{{ $p->idProduto }}">
            <div class="produto_part1exibe">
                <img class="img_produto" src="img/produtos/{{ $p->foto }}">
            </div>
                
            <div class="produto_part2exibe">
                <p class="title_produto">{{ $p->produto }}</p><br/>
                <p class="descricao_produto">{{ $p->descricao }}</p>
            </div>
                
            <div class="produto_part3exibe">
                <p class="valor_do_produto">R$ {{ $p->valor_venda }}</p>
                <button  class="add-to-cart" data-product-id="{{ $p->idProduto }}">Add</button>
            </div>
        </div>
    @endforeach
</div>
    <div class="carrinho">

        <form action="/Venda" method="post">
            {{ csrf_field() }}
            <label for="txVendaCliente">Cliente: </label>
            <select name="txVendaCliente" id="txVendaCliente">
                @foreach($cliente as $cli)
                <option value="{{$cli->idCliente}}">{{$cli->cliente}}</option>
                @endforeach
            </select>

            <label for="txTVenda">Tipo de Venda</label>
            <select name="txTVenda" id="txTVenda">
                <option value="Pronta entrega">Pronta entrega</option>
                <option value="Encomenda">Encomenda</option>
            </select>

            <label for="txDataPed">Data do Pedido</label>
            <input type="date" name="txDataPed" id="txDataPed">

            <label for="txDataEnt">Data da Entrega</label>
            <input type="date" name="txDataEnt" id="txDataEnt">

            
            <label for="txStatus">Status</label>
            <select name="txStatus" id="txStatus">
                <option value="Não Pago">Não Pago</option>
                <option value="Parcial">Parcial</option>
                <option value="Pago">Pago</option>
            </select>       
                
            <table class="carrinho_lista" id="cart-table">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor de Venda</th>
                    <th>Valor Total</th>
                </tr>
            </table>
            
            <label for="txTotalDaVenda">Total da Venda</label>
            <input type="text" name="txTotalDaVenda" id="txTotalDaVenda" readonly>

            <label for="txFPagamento">Forma de Pagamento</label>
            <select name="txFPagamento" id="txFPagamento">
                <option value=""></option>
                @foreach($fpagamento as $pag)
                <option value="{{$pag->idFPagamento}}">{{$pag->fPagamento}}</option>
                @endforeach
            </select>

            <input type="submit" value="Finalizar">
            
        </form>
    </div>

    <script src="/js/scriptcarrinho.js"></script> 
    <script src="/js/scriptinputs.js"></script> 









@endsection