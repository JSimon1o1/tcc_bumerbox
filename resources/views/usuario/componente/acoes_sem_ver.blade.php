<form method="post" class="d-inline-flex m-0 p-0" action="{{ route('usuarios.destroy', $usuario->id) }}">
    @method('delete')
    @csrf
    <a class="btn btn-link btn-sm" href="{{ route('usuarios.index') }}">Lista</a>
    <button class="btn btn-link btn-sm">Remover</button>
</form>
