@if(!isset($acao) && isset($id))
    <form method="post" action="{{ route("$resource.destroy", $id) }}">
        @csrf
        @method('delete')
        <div class="justify-content-center">
            <a class="btn btn-link btn-sm" href="{{ route("$resource.show", $id) }}">Ver</a>
            <a class="btn btn-link btn-sm" href="{{ route("$resource.edit", $id) }}">Editar</a>
            <button class="btn btn-link btn-sm">Remover</button>
        </div>
    </form>
@else
    @if($acao === 'create')
        <button type="button" class="btn btn-sm btn-link" href="{{ route("$resource.index") }}">Listar</button>
    @elseif($acao === 'index')
        <a type="button" class="btn btn-sm btn-link" data-bs-toggle="modal" data-bs-target="#filtros">Filtros</a>
        <a type="button" class="btn btn-sm btn-link" href="{{ route("$resource.create") }}">Novo</a>
    @elseif($acao === 'edit')
        <form method="post" action="{{ route("$resource.destroy", $id) }}">
            @csrf
            @method('delete')
            <div class="justify-content-center">
                <a type="button" class="btn btn-sm btn-link" href="{{ route("$resource.index") }}">Listar</a>
                <button class="btn btn-link btn-sm">Remover</button>
            </div>
        </form>
    @elseif($acao === 'show')
        <form method="post" action="{{ route("$resource.destroy", $id) }}">
            @csrf
            @method('delete')
            <div class="justify-content-center">
                <a type="button" class="btn btn-sm btn-link" href="{{ route("$resource.index") }}">Listar</a>
                <a type="button" class="btn btn-sm btn-link" href="{{ route("$resource.edit", $id) }}">Editar</a>
                <button class="btn btn-link btn-sm">Remover</button>
            </div>
        </form>
    @endif
@endif
