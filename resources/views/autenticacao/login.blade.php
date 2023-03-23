<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>{{ config('app.name') }} - @yield('titulo', 'Gestão de Recicláveis')</title>
</head>
<body>
<header class="navbar sticky-top flex-md-nowrap p-0 shadow">
    @include('includes.navbar')
</header>
<form>
    <h2>Login</h2>
    <figure>
        <img src="{{ asset('img/Group 14.png') }}" id="cadeado" class="img-fluid" alt="cadeado">
    </figure>
    <input type="text" id="username" name="username" placeholder="CPF/CNPJ:"><br><br>
    <input type="password" id="password" name="password" placeholder="Senha:"><br><br>
    <div class="container-entrar">
        <figure id="folha">
            <img src="{{ asset('img/folhas.png') }}" id="boneco" class="img-fluid" alt="folhas">
        </figure>
        <div class="div-entrar">
            <input type="submit" id="entrar" value="Entrar">
        </div>
        <figure id="boneco">
            <img src="{{ asset('img/boneco.png') }}" class="img-fluid" alt="boneco">
        </figure>
    </div>
</form>
</body>
</html>
