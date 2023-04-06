@if(Auth::check())
    <nav class="col-md-2 d-md-block menu">
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
                    <a class="nav-link" href="{{ route('conta.index') }}">Minha Conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
@endif
