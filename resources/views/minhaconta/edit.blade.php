@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-4 m-auto">

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('minhaconta.update', $usuarioId )}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="senha_atual" class="visually-hidden">Senha</label>
                    <input type="password" name="senha_atual" id="senha_atual" placeholder="Senha Atual"/>
                </div>

                <div>
                    <label for="nova_senha" class="visually-hidden">Senha</label>
                    <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova Senha"/>
                </div>

                <div>
                    <label for="confirmar_senha" class="visually-hidden">Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha"/>
                    <br><br><input type="checkbox" onclick="togglePasswordMinhaConta()">Mostrar a senha</input>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a type="button" class="btn btn-danger" href="{{ route('home.index') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
