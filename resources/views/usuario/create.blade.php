@extends('layout.base')

@section('conteudo')
    <div class="d-flex justify-content-end">
        <a type="button" class="btn btn-link btn-sm" href="{{ route('usuarios.index') }}">Lista</a>
    </div>

    <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        <div>
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome"/>
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
        <div>
            <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                   placeholder="Data de Nascimento"/>
            {{ $errors->has('data_nascimento') ? $errors->first('data_nascimento') : '' }}
        </div>
        <div>
            <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
            <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" pattern="^[0-9\.\-\/]*"
                   placeholder="CPF/CNPJ"/>
            {{ $errors->has('cpfcnpj') ? $errors->first('cpfcnpj') : '' }}
        </div>
        <div>
            <label for="senha" class="visually-hidden">Senha</label>
            <input type="password" name="senha" id="senha" value="{{ old('senha') }}" placeholder="Senha"/>
            {{ $errors->has('senha') ? $errors->first('senha') : '' }}
        </div>
        <div class="d-flex justify-content-center my-3">
            <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" role="switch" id="fidelizado" name="fidelizado">
                <label class="form-check-label" for="fidelizado">Fidelizado</label>
            </div>

            <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" role="switch" id="visivel" name="visivel" checked>
                <label class="form-check-label" for="visivel">Visível</label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
@endsection
