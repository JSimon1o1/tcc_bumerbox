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
        @if(isset($fakeAuth) && !$fakeAuth)
            <main class="col-md-12">
                @include('includes.titulopagina')
                @yield('conteudo')
                @include('includes.rodape')
            </main>
        @else
            <nav class="col-md-2 d-md-block menu">
                @include('includes.menu')
            </nav>
            <main class="col-md-10 ms-md-auto">
                @component('componentes.identificacao') @endcomponent
                @include('includes.titulopagina')
                @yield('conteudo')
                @include('includes.rodape')
            </main>
        @endunless

    </div>
</div>
</body>
</html>
