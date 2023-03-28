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
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block menu">
            @include('includes.menu')
        </nav>
        <main class="col-md-9 col-lg-10 ms-sm-auto">
            <div class="d-flex my-1 justify-content-end">
                <label id="informacao-label" class="p-2">Olá, Mercado Zé!</label>
            </div>

            @if(isset($titulo))
                <div class="d-grid justify-content-center text-center">
                    <h4>{{ $titulo }}</h4>
                    @if(isset($subTitulo))
                        <p>{{ $subTitulo }}</p>
                    @endif
                </div>
            @endif

            <div class="container">
                @yield('conteudo')
            </div>

            <div class="container-homepage">
                <figure id="folha">
                    <img src="{{ asset('img/folhas.png') }}" id="boneco" class="img-fluid" alt="folhas">
                </figure>
                <div class="div-entrar"></div>
                <figure id="boneco">
                    <img src="{{ asset('img/boneco.png') }}" class="img-fluid" alt="boneco">
                </figure>
            </div>
        </main>
    </div>
</div>
</body>
</html>
