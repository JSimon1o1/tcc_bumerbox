<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Usuario;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Exibe a listagem do Recurso (objeto do banco de dados)
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::whereHas('perfis', function (Builder $query) {
            $query->whereNot('tipo_perfil_codigo', '=', 'SYS');
        })
            ->where('visivel', true)
            ->paginate(15);

        return view('usuario.index')
            ->withTitulo('Listagem de usuários')
            ->withSubTitulo('Listagem com todos os usuários do sistema!')
            ->withRequest($request)
            ->withUsuarios($usuarios);
    }

    /**
     * Exibe o formulário para criação de um novo Recurso
     */
    public function create()
    {
        return view('usuario.create')
            ->withTitulo('Cadastro de usuários')
            ->withSubTitulo('Cadastre um usuários para utilizar o sistema!');
    }

    /**
     * Cria um Recurso novo no banco de dados baseado no request do formulário do create
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            Usuario::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.index');
    }

    /**
     * Exibe um Recurso específico do banco de dados baseado na chave primária
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show')
            ->withTitulo('Exibição de usuários')
            ->withSubTitulo('Os dados do usuario selecioando serão exibidos abaixo!')
            ->withUsuario($usuario);
    }

    /**
     * Exibe o formulário para edição de um Recurso
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit')
            ->withTitulo('Editação de usuários')
            ->withSubTitulo('Altere os dados do usuário selecionado!')
            ->withUsuario($usuario);
    }

    /**
     * Atualiza um Recurso do banco de dados baseado no formulário do edit e na chave primária
     */
    public function update(UpdateUserRequest $request, Usuario $usuario)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $usuario->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.show', $usuario->id);
    }

    /**
     * Remove um Recurso do banco de dados baseado na chave primária
     */
    public function destroy(Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('usuarios.index');
    }
}
