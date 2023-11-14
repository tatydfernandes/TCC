
@extends('layouts.layout-login')
@section('content')

    <form method="POST" action="">
        {{ csrf_field() }}

        <h1>Login</h1>
        <label for="usuario">Usuário</label><br/>
        <input type="text" name="txUsuario" id=usuario><br/>
        <label for="usuario">Senha</label><br/>
        <input type="password" name="txSenha" id=senha><br/>
        <input type="submit">
    </form>

@endsection