@extends('layout.base')

@section('conteudo')
    <div class="d-flex justify-content-end">
        @component('usuario.componente.acoes_sem_ver', ['usuario' => $usuario]) @endcomponent
    </div>

    <div class="table-responsive">
        <table class="table table-sm table-striped table-hover">
            <tbody>
            <tr>
                <th>#</th>
                <td>{{ $usuario->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{ $usuario->nome }}</td>
            </tr>
            <tr>
                <th>Data de nascimento</th>
                <td>{{ $usuario->data_nascimento_br }}</td>
            </tr>
            <tr>
                <th>CPF/CNPJ</th>
                <td>{{ $usuario->cpfcnpj_formatado }}</td>
            </tr>
            <tr>
                <th>Fidelizado</th>
                <td>{{ $usuario->fidelizado_sim_nao }}</td>
            </tr>
            <tr>
                <th>Criado em</th>
                <td>{{ $usuario->criado_em }}</td>
            </tr>
            <tr>
                <th>Modifiado em</th>
                <td>{{ $usuario->modificado_em }}</td>
            </tr>
            <tr>
                <th>Criado por</th>
                <td>{{ $usuario->criado_por }}</td>
            </tr>
            <tr>
                <th>Modificado por</th>
                <td>{{ $usuario->modificado_por }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
