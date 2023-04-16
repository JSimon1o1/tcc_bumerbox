@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-4 m-auto">
            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('registro.store') }}" method="post">
                @csrf
                <div>
                    <label for="nome" class="visually-hidden">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome"/>
                </div>

                <div>
                    <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
                    <input type="text" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                           data-type="date" placeholder="Data de Nascimento"/>
                </div>

                <div>
                    <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" data-type="cpfcnpj"
                           placeholder="CPF/CNPJ"/>
                </div>

                <div>
                    <label for="senha" class="visually-hidden">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha"/>
                </div>

                <div>
                    <label for="confirmar_senha" class="visually-hidden">Senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha"/>
                </div>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <a type="button" class="btn btn-danger" href="{{ route('login') }}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
