<div class="row">
    <div class="col-md-5 m-auto">
        <div class="d-flex justify-content-end">
            @component('componentes.navegacao.acoes', ['acao' => $acao, 'resource' => $recurso]) @endcomponent
        </div>

        @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

        {{ $slot }}
    </div>
</div>
