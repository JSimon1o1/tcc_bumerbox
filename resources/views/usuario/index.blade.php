@extends('layout.base')

@section('conteudo')
    <div class="d-flex justify-content-end mb-2">
        <a type="button" class="btn btn-sm btn-link" href="{{ route('usuarios.create') }}">Novo</a>
    </div>

    <div class="table-responsive">
        @if ($usuarios->total())
            <table class="table table-sm table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>CPF/CNPJ</th>
                    <th>Fidelizado</th>
                    <th colspan="3" class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->data_nascimento_br }}</td>
                        <td>{{ $usuario->cpfcnpj_formatado }}</td>
                        <td>{{ $usuario->fidelizado_sim_nao }}</td>
                        <td class="text-center">
                            @component('usuario.componente.acoes', ['usuario' => $usuario]) @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $usuarios->links() }}
        @else
            <p>Nenhum usuário encontrado!</p>
        @endif
    </div>
@endsection
