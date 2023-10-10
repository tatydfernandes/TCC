<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
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
        <div class="vitrine">
            @foreach($produto as $p)
            <div class="box_exibidor_produto">
                <div class="produto_part1exibe">
                    <img class="img_produto" src="img/produtos/{{ $p->foto }}">
                </div>

                <div class="produto_part2exibe">
                    <p class="title_produto">{{ $p->produto }}</p><br/>
                    <p class="descricao_produto">{{ $p->descricao }}</p>
                </div>

                <div class="produto_part3exibe">
                    <p class="valor_do_produto">R$ {{ $p->valor_venda }}</p>
                    <button>Add</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <footer></footer>
    
</body>
</html>