<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Exibe a listagem do Recurso (objeto do banco de dados)
     */
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

    /**
     * Exibe o formulário para criação de um novo Recurso
     */
    public function create()
    {
        return view('usuario.create')
            ->withTitulo('Cadastro de usuários')
            ->withSubTitulo('Cadastre um usuário para utilizar o sistema!');
    }

    /**
     * Cria um Recurso novo no banco de dados baseado no request do formulário do create
     */
    public function store(StoreUsuarioRequest $request)
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
            ->withSubTitulo('Os dados do usuário selecioando serão exibidos abaixo!')
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
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
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
