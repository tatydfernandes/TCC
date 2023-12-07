@extends('layouts.layout-login')
@section('content')

    <form method="POST" action="/login" class="form_auth">
        <img class="img_logo" src="img/logo.jpeg" class="logo">
        {{ csrf_field() }}

        <h1>Login</h1>
        <label for="usuario">Email</label><br/>
        <input type="text" name="email" id="usuario"><br/>
        <label for="usuario">Senha</label><br/>
        <input type="password" name="password" id="senha"><br/>
        <input type="submit" value="Entrar">
    </form>

@endsection