@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-4 m-auto">
            @component('componentes.erros', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('minhaconta.update', Auth::user()->id )}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="senha_antiga" class="visually-hidden">Senha</label>
                    <input type="password" name="senha_antiga" id="senha_antiga" placeholder="Senha Atual"/>
                </div>

                <div>
                    <label for="nova_senha" class="visually-hidden">Senha</label>
                    <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova Senha"/>
                </div>

                <div>
                    <label for="nova_senha_confirmar" class="visually-hidden">Senha</label>
                    <input type="password" name="nova_senha_confirmar" id="nova_senha_confirmar" placeholder="Confirmar senha"/>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a type="button" class="btn btn-danger" href="{{ route('home.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
