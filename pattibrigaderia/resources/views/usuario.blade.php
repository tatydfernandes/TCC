@extends('layouts.layout-login')
@section('content')

    <form action="/usuario" method="POST" class="form_auth">
        
        {{ csrf_field() }}
        <img class="img_logo" src="img/logo.jpeg" class="logo">

        <label for="nome">Nome:</label>
        <input type="text" name="name"id="nome"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br>

        <label for="senha">Senha:</label>        
        <input type="password" name="password" id="senha"><br>
        
        <input type="submit" value="Cadastrar" />
    </form>





@endsection