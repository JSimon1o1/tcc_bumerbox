@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'fornecedores','id' => $fornecedor->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nomefantasia" class="visually-hidden">Nome Fantasia</label>
                    <input type="text" name="nomefantasia" id="nomefantasia" value="{{ $fornecedor->nome }}" placeholder="Nome Fantasia"/>
                </div>

                <div>
                    <label for="cpfcnpj" class="visually-hidden">CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" data-type="cpfcnpj" placeholder="CPF/CNPJ"
                           value="{{ $fornecedor->isCpfOrCnpj }}">
                </div>
                <div>
                    <label for="cep" class="visually-hidden">CEP</label>
                    <input type="text" name="cep" id="cep" value="{{ $fornecedor->enderecos->first()->isCep ?? '' }}"
                           data-type="cep" placeholder="CEP"/>
                </div>

                <div>
                    <label for="endereco" class="visually-hidden">Endereço</label>
                    <input type="text" name="endereco" id="endereco" value="{{ $fornecedor->enderecos->first()->rua ?? '' }}"
                           placeholder="Endereço"/>
                </div>

                <div>
                    <label for="telefone" class="visually-hidden">Telefone</label>
                    <input type="text" name="telefone" id="telefone" data-type="telefone" placeholder="Telefone"
                           value="{{ $fornecedor->telefones->first()->isNumero ?? '' }}"/>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
