@extends('layout.base', ['fakeAuth' => $fakeAuth])

@section('conteudo')
    <div class="row">
        <div class="col-md-4 m-auto">
            <form>
                <h2>Login</h2>
                <figure>
                    <img src="{{ asset('img/Group 14.png') }}" id="cadeado" class="img-fluid" alt="cadeado">
                </figure>
                <div>
                    <label class="visually-hidden" for="cpfcnpj">CPF/CNPJ</label>
                    <input type="text" id="cpfcnpj" name="cpfcnpj" placeholder="CPF/CNPJ"><br><br>
                </div>
                <div>
                    <label class="visually-hidden" for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha"><br><br>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
