@extends('layouts.layoutdefault')
@section('content')
<div class="carrinho">

    <form action="/Venda" method="post">
        {{ csrf_field() }}
        <label for="txVendaCliente">Cliente:  
        <select name="txVendaCliente" id="txVendaCliente">
            @foreach($cliente as $cli)
            <option value="{{$cli->idCliente}}">{{$cli->cliente}}</option>
            @endforeach
        </select></label>

        <label for="txTVenda">Tipo de Venda 
        <select name="txTVenda" id="txTVenda">
            <option value="Pronta entrega">Pronta entrega</option>
            <option value="Encomenda">Encomenda</option>
        </select></label><br>

        <label for="txDataPed">Data do Pedido 
        <input type="date" name="txDataPed" id="txDataPed"></label>

        <label for="txDataEnt">Data da Entrega 
        <input type="date" name="txDataEnt" id="txDataEnt" required></label>

        
           
            
        <table class="carrinho_lista" id="cart-table">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor de Venda</th>
                <th>Valor Total</th>
                <th></th>
            </tr>
        </table>
        
        <label for="txTotalDaVenda">Total da Venda 
        <input type="text" name="txTotalDaVenda" id="txTotalDaVenda" readonly></label>

        
        <label for="txFPagamento">Forma de Pagamento 
        <select name="txFPagamento" id="txFPagamento" require>
            @foreach($fpagamento as $pag)
            <option value="{{$pag->idFPagamento}}">{{$pag->fPagamento}}</option>
            @endforeach
        </select></label>
        
        <label for="txStatus">Status
        <select name="txStatus" id="txStatus" require>
            <option value="Não Pago">Não Pago</option>
            <option value="Parcial">Parcial</option>
            <option value="Pago">Pago</option>
        </select></label><br>    
        <input type="submit" value="Finalizar">
        
    </form>
</div>

@foreach($produtosPorCategoria as $categoria => $produtosCategoria)
<div class="vitrine">

    <h1>{{ $categoria }}</h1>
    <div class="vitrine">
    
    
        @foreach($produtosCategoria as $produto)
        <div class="box_exibidor_produto" data-product-id="{{ $produto->idProduto }}">
            <div class="produto_part1exibe">
                <img class="img_produto" src="img/produtos/{{ $produto->foto }}">
            </div>
        
            <div class="produto_part2exibe">
                <p class="title_produto">{{ $produto->produto }}</p><br/>
                <p class="descricao_produto">{{ $produto->descricao }}</p>
            </div>
        
            <div class="produto_part3exibe">
                <p class="valor_do_produto">R$ {{ $produto->valor_venda }}</p>
                <button class="add-to-cart" data-product-id="{{ $produto->idProduto }}">Add</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

    <script src="/js/scriptcarrinho.js"></script> 
    <script src="/js/scriptinputs.js"></script> 









@endsection