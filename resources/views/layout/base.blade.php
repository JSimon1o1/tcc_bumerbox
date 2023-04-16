<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>{{ config('app.name') }} - @yield('titulo', 'Gestão de Recicláveis')</title>
</head>
<body>
<header class="navbar sticky-top flex-md-nowrap p-0 shadow">
    @include('includes.topo')
</header>
<div class="container-fluid">
    <div class="row">
        @include('includes.menu')
        <main class="{{ Auth::check() ? 'col-md-10 ms-md-auto' : 'col-md-12' }}">
            @component('componentes.autenticacao.identificacao') @endcomponent
            @include('includes.titulopagina')
            @yield('conteudo')
            @component('componentes.avisos.alertas') @endcomponent
            @include('includes.rodape')
        </main>
    </div>
</div>
@include('includes.footer')
</body>
</html>
