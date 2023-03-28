<form method="post" class="d-inline-flex m-0 p-0" action="{{ route('usuarios.destroy', $usuario->id) }}">
    @method('delete')
    @csrf
    <a class="btn btn-link btn-sm" href="{{ route('usuarios.show', $usuario->id) }}">Ver</a>
    <a class="btn btn-link btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
    <button class="btn btn-link btn-sm">Remover</button>
</form>
