@extends('layouts.layoutdefault')
@section('content')


<table class="table_lista">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor Custo</th>
                <th>Valor Venda</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
            
            @foreach($produto as $p)
            <tr>
                <td>{{ $p->idProduto }}</td>
                <td>{{ $p->produto }}</td>
                <td>{{ $p->descricao }}</td>
                <td>{{ $p->categoria }}</td>
                <td>{{ $p->valor_unitario }}</td>
                <td>R$ {{ $p->valor_venda }}</td>
                <td><a href="img/produtos/{{ $p->foto }}">{{ $p->foto }}</a></td>
                <td>
                    <a href="/lista-produtos/excluir/{{ $p->idProduto }}"><img src="img/icon/excluir.png" class="icon_acoes"></a><!-- Exclui o produto do banco de dados -->
                    <a href="/produto-editar/editar/{{ $p->idProduto }}"><img src="img/icon/Editar.png" class="icon_acoes"></a><!-- Edita o produto do banco de dados -->
                </td>
            </tr>
            @endforeach
        </table>

@endsection