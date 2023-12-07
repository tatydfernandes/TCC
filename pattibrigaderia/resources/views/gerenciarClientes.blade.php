@extends('layouts.layout-editores')
@section('content')

<div class="container">
    <a href="lista-clientes"><button>Lista de Clientes</button></a>
    <form action="/Cliente" method="post" id="formCliente">
        {{ csrf_field() }}
        <h1>Cadastro de Clientes</h1>
             
            <label for="cadClienteNome">Nome: 
            <input type="text" name="txNomeCliente" id="cadClienteNome"></label>
                
            <label for="cadClienteCelular">Celular: 
            <input type="tel" name="txCelularCliente" id="cadClienteCelular"></label>
                    
            <label for="cadClienteEmail">Email: 
            <input type="text" name="txEmailCliente" id="cadClienteEmail"></label>
                        

            <label for="cadClienteCEP">CEP:  
            <input type="text" name="txCepCliente" id="cadClienteCEP"></label>
                
            <label for="cadClienteMunicipio">Município: 
            <input type="text" name="txMunicipioCliente" id="cadClienteMunicipio"></label>
                    
            <label for="cadClienteBairro">Bairro: 
            <input type="text" name="txBairroCliente" id="cadClienteBairro"></label>
        
        
        
            <label for="cadClienteLogradouro">Logradouro: 
            <input type="text" name="txLogradouroCliente" id="cadClienteLogradouro"></label>
        
            <label for="cadClienteNumero">Nº:
            <input type="text" name="txNumeroCsCliente" id="cadClienteNumero"></label>
        
            <label for="cadClienteComplemento">Complemento:
            <input type="text" name="txComplementoCsCliente" id="cadClienteComplemento"></label>
        
        
        
        
        
        <input type="reset" value="Limpar todos os campos">
        <input type="submit" value="Salvar">
        
    </form>
</div>

@endsection