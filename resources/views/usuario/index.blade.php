@extends('layout.base')


@section('conteudo')
    <div class="d-flex justify-content-end mb-2">
        <a type="button" class="btn btn-link" href="{{ route('usuarios.create') }}">Novo usuário</a>
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
                    <th class="text-center">Ações</th>
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
                            <a class="btn-sm" href="{{ route('usuarios.show', $usuario->id) }}">Visualizar</a>
                            <a class="btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                            <a class="btn-sm" href="{{ route('usuarios.destroy', $usuario->id) }}">Remover</a>
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
