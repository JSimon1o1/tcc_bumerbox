@extends('layout.base')

@section('conteudo')
    <div class="my-3 p-3 rounded shadow-sm bg-body">
        <h6 class="pb-2 mb-0">Últimas Atualizações</h6>
        <div class="d-flex text-body-secondary pt-3 border-bottom">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">@sistema</strong>
                Na nossa última atualização, criamos o cadastro dos Fornecedores.
                Agora você pode incluir qualquer fornecedor para a parceria entre Bumerbox e seu estabelecimento. =D
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3 border-bottom">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">@administrador</strong>
                Pensando em melhorias recorrentes, adicionamos uma opção de visualizar a senha digitada,
                toast de sucesso e erro em cada operação e redirecionamento para a HOME quando clica no link. =D
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <strong class="d-block text-gray-dark">@sistema</strong>
                Na nossa próxima atualização, teremos o acesso dos menus conforme perfil de usuário,
                criação das telas de cadastro das embalagens, exporte de relatórios e qualquer outra melhoria
                que você pode sugerir pelo e-mail: atendimento@bumerbox.com.br.
            </p>
        </div>
        <small class="d-block text-end mt-3">
            <a href="{{ asset('/home') }}" class="btn btn-success">Todas as atualizações</a>
        </small>
    </div>
@endsection
