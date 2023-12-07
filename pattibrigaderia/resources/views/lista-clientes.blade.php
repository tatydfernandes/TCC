@extends('layouts.layoutdefault')
@section('content')


<div class="container_A">    
    <table class="tabela_cliente">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>CEP</th>
            <th>Ações</th>
        </tr>
        @foreach($cliente as $cli)
        <tr>
            <td>{{$cli->idCliente}}</td>
            <td>{{$cli->cliente}}</td>
            <td>{{$cli->celular}}</td>
            <td>{{$cli->email}}</td>
            <td>{{$cli->logradouro}},{{$cli->numero}} {{$cli->complemento}} - {{$cli->bairro}},{{$cli->municipio}}</td>
            <td>{{$cli->cep}}</td>
            <td>
                <a href="/gerenciarClientes/excluir/{{ $cli->idCliente }}"><img src="img/icon/excluir.png" class="icon_acoes"></a>
                <a href="/cliente/editar/{{ $cli->idCliente }}"><img src="img/icon/editar.png" class="icon_acoes"></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
        
@endsection