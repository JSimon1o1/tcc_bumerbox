@extends('layout.base')

@section('conteudo')
    <form action="#">
        <h2> Alterar Senha </h2>
        <div class="container-entrar"></div>
        <input type="password" name="senha-atual" placeholder="Senha atual">
        <input type="password" name="nova-senha" placeholder="Nova senha">
        <input type="password" name="confirma-nova-senha" placeholder="Confirmar nome senha">
        <input type="submit" value="Salvar"/>
    </form>
@endsection
