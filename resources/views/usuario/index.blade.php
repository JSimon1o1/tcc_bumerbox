@extends('layout.base')

@section('conteudo')
    {{isset($status) ?? $status}}
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.acoes', ['acao' => 'index', 'resource' => 'usuarios'])
                @endcomponent
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
                                <td>{{ $usuario->dataNascimentoBr }}</td>
                                <td>{{ $usuario->isCpfOrCnpj }}</td>
                                <td>{{ $usuario->isFidelizado }}</td>
                                <td class="text-center">
                                    @component('componentes.acoes', ['resource' => 'usuarios', 'id' => $usuario->id])
                                    @endcomponent
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
        </div>
    </div>
@endsection
