@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <form>
                <div>
                    <label class="visually-hidden" for="senha-atual">Senha atual</label>
                    <input type="password" id="senha-atual" name="senha_atual" placeholder="Senha atual">
                </div>
                <div>
                    <label class="visually-hidden" for="nova-senha">Nova senha</label>
                    <input type="password" id="nova-senha" name="nova_senha" placeholder="Nova senha">
                </div>
                <div>
                    <label class="visually-hidden" for="confirmar-senha">Confirmar senha</label>
                    <input type="password" id="confirmar-senha" name="confirmar_senha" placeholder="Confirmar senha">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
