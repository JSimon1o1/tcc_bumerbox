@extends('layout.base')

@section('conteudo')
    <div class="d-flex justify-content-end">
        @component('usuario.componente.acoes_sem_ver', ['usuario' => $usuario]) @endcomponent
    </div>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $usuario->nome ?? old('nome') }}" placeholder="Nome"/>
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
        <div>
            <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento"
                   value="{{ $usuario->data_nascimento ?? old('visivel') }}" placeholder="Data de Nascimento"/>
            {{ $errors->has('data_nascimento') ? $errors->first('data_nascimento') : '' }}
        </div>
        <div>
            <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
            <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ $usuario->cpfcnpjFormatado ?? old('visivel') }}"
                   pattern="^[0-9\.\-\/]*" placeholder="CPF/CNPJ"/>
            {{ $errors->has('cpfcnpj') ? $errors->first('cpfcnpj') : '' }}
        </div>
        <div class="d-flex justify-content-center my-3">
            <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" role="switch" id="fidelizado"
                       name="fidelizado" {{ $usuario->fidelizado ? 'checked' : old('visivel') }}>
                <label class="form-check-label" for="fidelizado">Fidelizado</label>
            </div>

            <div class="form-check form-switch form-check-inline">
                <input class="form-check-input" type="checkbox" role="switch" id="visivel"
                       name="visivel" {{ $usuario->visivel ? 'checked' : old('visivel') }}>
                <label class="form-check-label" for="visivel">Visível</label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>
    </form>
@endsection
