<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
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
            ->orWhere('tipo_perfil_codigo', '=', 'USR')
            ->where('visivel', true)
            ->paginate(10);

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
            $usuario = Usuario::create($request->all());
            $usuario->perfis()->create(['usuario_id' => $usuario->id, 'tipo_perfil_codigo' => 'USR']);
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('usuarios.show', $usuario->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.show')
            ->withTitulo($usuario->nome)
            ->withSubTitulo('Os dados do usuário selecionado serão exibidos abaixo!')
            ->withUsuario($usuario);
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.edit')
            ->withTitulo($usuario->nome)
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
            return back()->with('success', false)->with('menssagem', "Não possível atualizar o registro!");
        }

        return to_route('usuarios.show', $usuario->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
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
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('usuarios.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
