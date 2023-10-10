<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PattiBrigaderia</title>
</head>
<body>
    <header>
        <a href="/">
            <img class="img_logo" src="img/logo.jpeg" class="logo">
        </a>
    </header>
    <nav>
        <a href="/"><button>Home</button></a>
        <a href="precificador"><button>Precificar</button></a>
        <a href="vender"><button>Vender</button></a>
        <a href=""><button>Visualizar Vendas</button></a>
    </nav>

    <div class="content">
        
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

    </div>

    <footer></footer>    
</body>
</html>