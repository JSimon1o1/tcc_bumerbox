<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuarios = Usuario::select('usuarios.*')
            ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
            ->where('tipo_perfil_codigo', '!=', 'SYS')
            ->orWhere('tipo_perfil_codigo', '=', null)
            ->where('visivel', true)
            ->paginate(15);

        return view('usuario.index')
            ->withTitulo('Listagem de usuários')
            ->withSubTitulo('Listagem com todos os usuários do sistema!')
            ->withRequest($request)
            ->withUsuarios($usuarios);
    }

    public function create()
    {
        return view('usuario.create')
            ->withTitulo('Cadastro de usuários')
            ->withSubTitulo('Cadastre um usuário para utilizar o sistema!');
    }

    public function store(StoreUsuarioRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            Usuario::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.index');
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.show')
            ->withTitulo('Exibição de usuários')
            ->withSubTitulo('Os dados do usuário selecioando serão exibidos abaixo!')
            ->withUsuario($usuario);
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.edit')
            ->withTitulo('Editação de usuários')
            ->withSubTitulo('Altere os dados do usuário selecionado!')
            ->withUsuario($usuario);
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $usuario->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.show', $usuario->id);
    }

    public function destroy(Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.index');
    }
}
