@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'fornecedor', 'errors' => $errors])
        <form action="{{ route('fornecedor.store') }}" method="post">
            @csrf

            <div>
                <label for="nomefantasia" class="visually-hidden">Nome Fantasia</label>
                <input type="text" name="nomefantasia" id="nomefantasia" value="{{ old('nome') }}" placeholder="Nome Fantasia"/>
            </div>

            <div>
                <label for="cpfcnpj" class="visually-hidden">CNPJ</label>
                <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" data-type="cpfcnpj"
                       placeholder="CPF/CNPJ"/>
            </div>

            <div>
                <label for="cep" class="visually-hidden">CEP</label>
                <input type="text" name="cep" id="cep" value="{{ old('cep') }}" data-type="cep" placeholder="CEP"/>
            </div>

            <div>
                <label for="endereco" class="visually-hidden">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" placeholder="Endereço"/>
            </div>

            <div>
                <label for="telefone" class="visually-hidden">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" data-type="telefone"
                       placeholder="Telefone"/>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection
