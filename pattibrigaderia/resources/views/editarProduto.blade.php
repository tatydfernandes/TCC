@extends('layouts.layout-editores')
@section('content')

<div class="container">
    <h1>Editar Produto</h1>

    <form action="{{ url('/produto/' . $produto->idProduto) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Adicione um campo oculto para indicar o método PUT -->
        {{ method_field('PUT') }}

        <label for="txNomeProduto">Nome do produto:</label>
        <input type="text" name="txNomeProduto" value="{{ $produto->produto }}" required><br>

        <label for="txValorSProduto">Valor Sugerido:</label>
        <input type="text" name="txValorSProduto" value="{{ $produto->valor_unitario }}" readonly="readonly"><br>

        <label for="txValorVProduto">Valor de Venda:</label>
        <input type="text" name="txValorVProduto" value="{{ $produto->valor_venda }}"><br>

        <label for="txCategoria">Categoria:</label>
        <select name="txCategoria">
            <option value="Brigadeiro" {{ $produto->categoria == 'Brigadeiro' ? 'selected' : '' }}>Brigadeiro</option>
            <option value="Bolo-de-pote" {{ $produto->categoria == 'Bolo-de-pote' ? 'selected' : '' }}>Bolo de pote</option>
            <option value="Brownie" {{ $produto->categoria == 'Brownie' ? 'selected' : '' }}>Brownie</option>
        </select><br>

        <label for="txDescrProduto">Descrição:</label>
        <textarea name="txDescrProduto">{{ $produto->descricao }}</textarea><br>

        <label for="image" class="custom-file-upload">
            Selecionar imagem
        </label>
        <input id="image" type="file" name="image">

        <!-- Adicione outros campos do formulário conforme necessário -->

        <input type="reset" value="Limpar">
        <input type="submit" value="Salvar">
    </form>

</div>

@endsection
