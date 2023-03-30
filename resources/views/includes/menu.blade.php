<div class="position-sticky menu-lateral">
    <ul class="nav flex-column bg-green-lime">
        <h6 class="menu-opcao d-flex">Cadastros</h6>

        <li class="nav-item">
            <a class="nav-link" href="#">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Fornecedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Categoria</a>
        </li>

        <h6 class="menu-opcao d-flex">Extrair</h6>

        <li class="nav-item">
            <a class="nav-link" href="#">Relatórios</a>
        </li>

        <h6 class="menu-opcao d-flex">Configurações</h6>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('conta.edit', 1) }}">Minha Conta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('autenticacao.login') }}">Sair</a>
        </li>
    </ul>
</div>
