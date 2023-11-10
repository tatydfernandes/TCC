@extends('layouts.layoutdefault')
@section('content')

<div class="container_cliente_form">
    <form action="/Cliente" method="post" id="formCliente">
        {{ csrf_field() }}
        <h1>Cadastro de Clientes</h1>
        <div class="groupForm">
             
            <label for="cadClienteNome">Nome: 
            <input type="text" name="txNomeCliente" id="cadClienteNome"></label><br>
                
            <label for="cadClienteCelular">Celular: 
            <input type="tel" name="txCelularCliente" id="cadClienteCelular"></label>
                    
            <label for="cadClienteEmail">Email: 
            <input type="text" name="txEmailCliente" id="cadClienteEmail"></label><br>
                        
        </div>
        <div class="groupForm">

            <label for="cadClienteCEP">CEP:  
            <input type="text" name="txCepCliente" id="cadClienteCEP"></label>
                
            <label for="cadClienteMunicipio">Município: 
            <input type="text" name="txMunicipioCliente" id="cadClienteMunicipio"></label>
                    
            <label for="cadClienteBairro">Bairro: 
            <input type="text" name="txBairroCliente" id="cadClienteBairro"></label><br>
        </div>
        
        
        <div class="groupForm">
        <label for="cadClienteLogradouro">Logradouro: 
            <input type="text" name="txLogradouroCliente" id="cadClienteLogradouro"></label>
        
            <label for="cadClienteNumero">Nº:
            <input type="text" name="txNumeroCsCliente" id="cadClienteNumero"></label>
        
            <label for="cadClienteComplemento">Complemento:
            <input type="text" name="txComplementoCsCliente" id="cadClienteComplemento"></label><br>
        </div>
        
        
        
        
        <input type="reset" value="Limpar todos os campos">
        <input type="submit" value="Salvar">
        
    </form>
</div><br>


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
            <td><a href="/gerenciarClientes/excluir/{{ $cli->idCliente }}"><img src="img/icon/excluir.png" class="icon_acoes"></a></td>
        </tr>
        @endforeach
    </table>
</div>
        
@endsection