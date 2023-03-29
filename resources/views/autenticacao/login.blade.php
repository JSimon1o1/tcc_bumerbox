@extends('layout.base', ['autenticado' => false])

@section('conteudo')
    <form>
        <h2>Login</h2>
        <figure>
            <img src="{{ asset('img/Group 14.png') }}" id="cadeado" class="img-fluid" alt="cadeado">
        </figure>
        <input type="text" id="username" name="username" placeholder="CPF/CNPJ:"><br><br>
        <input type="password" id="password" name="password" placeholder="Senha:"><br><br>
    </form>
@endsection
