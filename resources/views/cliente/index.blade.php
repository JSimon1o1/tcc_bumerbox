@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
    'registros' => $clientes,
    'resource' => 'clientes',
    'titulos' => ['#', 'Nome', 'Data de Nascimento', 'CPF/CNPJ', 'Fidelizado'],
    'colunas' => ['id', 'nome', 'dataNascimentoBr', 'isCpfOrCnpj', 'isFidelizado']
])
    @endcomponent
@endsection
