@extends('layouts.layout-editores')


@section('content')
    <div class="container">
        <form action="/cliente/{{ $cliente->idCliente }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <h1>Editar Cliente</h1>
                <label for="cadClienteNome">Nome: 
                    <input type="text" name="txNomeCliente" id="cadClienteNome" value="{{ $cliente->cliente }}">
                </label><br>

                <label for="cadClienteCelular">Celular: 
                    <input type="tel" name="txCelularCliente" id="cadClienteCelular" value="{{ $cliente->celular }}">
                </label>

                <label for="cadClienteEmail">Email: 
                    <input type="text" name="txEmailCliente" id="cadClienteEmail" value="{{ $cliente->email }}">
                </label>

                <label for="cadClienteCEP">CEP:  
                    <input type="text" name="txCepCliente" id="cadClienteCEP" value="{{ $cliente->cep }}">
                </label>

                <label for="cadClienteMunicipio">Município: 
                    <input type="text" name="txMunicipioCliente" id="cadClienteMunicipio" value="{{ $cliente->municipio }}">
                </label>

                <label for="cadClienteBairro">Bairro: 
                    <input type="text" name="txBairroCliente" id="cadClienteBairro" value="{{ $cliente->bairro }}">
                </label>

                <label for="cadClienteLogradouro">Logradouro: 
                    <input type="text" name="txLogradouroCliente" id="cadClienteLogradouro" value="{{ $cliente->logradouro }}">
                </label>

                <label for="cadClienteNumero">Nº:
                    <input type="text" name="txNumeroCsCliente" id="cadClienteNumero" value="{{ $cliente->numero }}">
                </label>

                <label for="cadClienteComplemento">Complemento:
                    <input type="text" name="txComplementoCsCliente" id="cadClienteComplemento" value="{{ $cliente->complemento }}">
                </label>

            <input type="reset" value="Limpar todos os campos">
            <input type="submit" value="Atualizar">
        </form>
    </div>
@endsection
