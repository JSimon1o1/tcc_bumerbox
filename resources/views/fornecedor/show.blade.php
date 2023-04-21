@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'fornecedor', 'id' => $fornecedor->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $fornecedor->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome Fantasia</th>
                        <td>{{ $fornecedor->nome }}</td>
                    </tr>
                    <tr>
                        <th>CNPJ</th>
                        <td>{{ $fornecedor->isCpfOrCnpj }}</td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td>{{ $fornecedor->enderecos->first()->isCep ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Endereço</th>
                        <td>{{ $fornecedor->enderecos->first()->rua ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{{ $fornecedor->telefones->first()->isNumero ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $fornecedor->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $fornecedor->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $fornecedor->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $fornecedor->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
