@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            @component('componentes.erros', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('registro.store') }}" method="post">
                @csrf
                <div>
                    <label for="nome" class="visually-hidden">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome"/>
                </div>

                <div>
                    <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                           placeholder="Data de Nascimento"/>
                </div>

                <div>
                    <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" pattern="^[0-9\.\-\/]*"
                           maxlength="18" placeholder="CPF/CNPJ"/>
                </div>

                <div>
                    <label for="senha" class="visually-hidden">Senha</label>
                    <input type="password" name="senha" id="senha" value="{{ old('senha') }}" placeholder="Senha"/>
                </div>

                <div>
                    <label for="confirmar_senha" class="visually-hidden">Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha"
                           value="{{ old('confirmar_senha') }}" placeholder="Confirmar senha"/>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <a type="button" class="btn btn-danger" href="{{ route('autenticacao.login') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
