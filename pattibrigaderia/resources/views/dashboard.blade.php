@extends('layouts.layoutdefault')
@section('content')


<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Quantidade do produto</th>
        <th>Valor total do produto</th>
        <th>Tipo de venda</th>
        <th>data da venda</th>
        <th>data da entrega</th>
        <th>Forma de Pagamento</th>
        <th>status de pagamento</th>
    </tr>
    @foreach($venda as $v)
    <tr>
        <td>{{$v->idVenda}}</td>
        <td>{{$v->idCliente}}</td>
        <td>{{$v->idProduto}}</td>
        <td>{{$v->qtdProduto}}</td>
        <td>{{$v->valorTotalProduto}}</td>
        <td>{{$v->tpVenda}}</td>
        <td>{{$v->dtVenda}}</td>
        <td>{{$v->dtEntrega}}</td>
        <td>{{$v->idFPagamento}}</td>
        <td>{{$v->status}}</td>
    </tr>
    @endforeach
</table>

@endsection