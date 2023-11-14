@extends('layouts.layoutdefault')
@section('content')


<table class="table_vendas">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Tipo de venda</th>
        <th>Data da venda</th>
        <th>Data da entrega</th>
        <th>Total da Venda</th>
        <th>Forma de Pagamento</th>
        <th>Status</th>
    </tr>
    @foreach($vendas as $v)
    <tr>
        <td>{{$v->idVenda}}</td>
        <td>{{$v->cliente}}</td>
        <td>{{$v->tpVenda}}</td>
        <td>{{$v->dtVenda}}</td>
        <td>{{$v->dtEntrega}}</td>
        <td>{{$v->totalVenda}}</td>
        <td>{{$v->fPagamento}}</td>
        <td>{{$v->status}}</td>
    </tr>
    
    @endforeach
</table>

@endsection