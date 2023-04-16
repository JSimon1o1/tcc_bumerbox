<div class="row">
    <div class="col-md-10 m-auto">
        <div class="d-flex justify-content-end">
            @component('componentes.navegacao.acoes', ['acao' => 'index', 'resource' => $resource]) @endcomponent
        </div>
        <div class="table-responsive">
            @if ($registros->total())
                <table class="table table-sm table-striped table-hover">
                    <thead>
                    <tr>
                        @foreach($titulos as $titulo)
                            <th>{{ $titulo }}</th>
                        @endforeach
                        <th colspan="3" class="text-center"> Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            @foreach($colunas as $coluna)
                                <td>{{ $registro->$coluna }}</td>
                            @endforeach
                            <td class="text-center">
                                @component('componentes.navegacao.acoes', ['resource' => $resource, 'id' => $registro->id]) @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $registros->onEachSide(0)->links() }}
            @else
                <p class="text-center">Nenhum registro encontrado!</p>
            @endif
        </div>
    </div>
</div>
