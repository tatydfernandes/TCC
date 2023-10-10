<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>PattiBrigaderia</title>
</head>
<body>
    <header>
        <a href="/">
            <img class="img_logo" src="{{ asset('img/logo.jpeg') }}" class="logo">
        </a>
    </header>
    <nav>
        <a href="/"><button>Home</button></a>
        <a href="precificador"><button>Precificar</button></a>
        <a href="vender"><button>Vender</button></a>
        <a href=""><button>Visualizar Vendas</button></a>
    </nav>

    <div class="content">
        <form method="POST" action="/atualizar-produto">
            {{ csrf_field() }}
            <input type="hidden" name="produto_id" value="{{ $produto->idProduto }}">
    
            <label for="produto">Produto:</label>
            <input type="text" id="produto" name="txNomeProduto" value="{{ $produto->produto }}" required><br>
    
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="txDescrProduto" required>{{ $produto->descricao }}</textarea><br>
    
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" value="{{ $produto->categoria }}">
                <option value="{{ $produto->categoria }}">{{ $produto->categoria }}</option>
            </select><br>
    
            <label for="valor_unitario">Valor Custo:</label>
            <input type="text" id="valor_unitario" name="txValorSProduto" value="{{ $produto->valor_unitario }}" required><br>
    
            <label for="valor_venda">Valor Venda:</label>
            <input type="text" id="valor_venda" name="txValorVProduto" value="{{ $produto->valor_venda }}" required><br>

            <button type="submit">Salvar</button>
        </form>

    </div>

    <footer></footer>    
</body>
</html>