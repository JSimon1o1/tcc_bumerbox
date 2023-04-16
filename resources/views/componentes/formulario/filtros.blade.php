<div class="modal fade" id="filtros" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="nome" class="visually-hidden">Nome</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome"/>
                    </div>

                    <div>
                        <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                        <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" data-type="cpfcnpj"
                               placeholder="CPF/CNPJ"/>
                    </div>

                    <div>
                        <label for="cep" class="visually-hidden">CEP</label>
                        <input type="text" name="cep" id="cep" value="{{ old('cep') }}" data-type="cep"
                               placeholder="CEP"/>
                    </div>

                    <div>
                        <label for="endereco" class="visually-hidden">Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}"
                               placeholder="Endereço"/>
                    </div>

                    <div>
                        <label for="telefone" class="visually-hidden">Telefone</label>
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                               data-type="telefone"
                               placeholder="Telefone"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-sm btn-success">Filtrar</button>
            </div>
        </div>
    </div>
</div>
