<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Exibe a listagem do Recurso (objeto do banco de dados)
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::where('visivel', true)->paginate(15);

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
    public function store(Request $request)
    {
        $regas = [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => 'required|min:11|max:18',
            'senha' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo :attribute deve possuir pelo menos três carateres',
            'nome.max' => 'O campo :attribute deve possuir no máximo três carateres',
            'cpfcnpj.min' => 'O campo :attribute não pode possuir menos de 11 dígitos',
            'cpfnpj.max' => 'O campo :attribute não pode possui mais de 18 dígitos',
        ];

        $request->validate($regas, $feedback);

        Usuario::create(
            array_merge($request->all(), [
                    'visivel' => $request->has('visivel'),
                    'fidelizado' => $request->has('fidelizado'),
                    'cpfcnpj' => preg_replace('/\D/', '', $request->get('cpfcnpj')),
                ]
            )
        );
        return redirect()->route('usuarios.index');
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
    public function update(Request $request, Usuario $usuario)
    {
        $regas = [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => 'required|min:11|max:18',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo :attribute deve possuir pelo menos três carateres',
            'nome.max' => 'O campo :attribute deve possuir no máximo três carateres',
            'cpfcnpj.min' => 'O campo :attribute não pode possuir menos de 11 dígitos',
            'cpfnpj.max' => 'O campo :attribute não pode possui mais de 18 dígitos',
        ];

        $request->validate($regas, $feedback);

        $usuario->update(
            array_merge($request->all(), [
                    'visivel' => $request->has('visivel'),
                    'fidelizado' => $request->has('fidelizado'),
                    'cpfcnpj' => preg_replace('/\D/', '', $request->get('cpfcnpj')),
                ]
            )
        );
        return redirect()->route('usuarios.show', $usuario->id);
    }

    /**
     * Remove um Recurso do banco de dados baseado na chave primária
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
