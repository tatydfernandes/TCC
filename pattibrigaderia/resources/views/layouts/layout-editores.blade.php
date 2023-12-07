<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style_editores.css') }}">
    <title>PattiBrigaderia</title>
</head>
<body>
    <header>
        <a href="/">
            <img class="img_logo" src="{{ asset('img/logo.jpeg') }}" class="logo">
        </a>
    </header>
    <nav>
        <a href="{{ url('/') }}"><button>Vender</button></a>
        <a href="{{ url('lista-produtos') }}"><button>Produtos</button></a>
        <a href="{{ url('precificador') }}"><button>Precificar</button></a>
        <a href="{{ url('gerenciarClientes') }}"><button>Clientes</button></a>
        <a href="{{ url('dashboard') }}"><button>Relatório</button></a>
        <a href="{{ url('/logout') }}"><button>sair</button></a>

    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>