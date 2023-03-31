<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Models\Registro;
use Exception;
use http\Message;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Redireciona para o /create se acessar diretamente o /.
     */
    public function index()
    {
        return to_route('registro.create');
    }

    /**
     * Exibe o formulário para criação de um novo usuário.
     */
    public function create()
    {
        return view('registro.create')
            ->withTitulo('Registro de usuário')
            ->withSubTitulo('Realize seu cadastro para acessar o sistema!')
            ->withFakeAuth(false);
    }

    /**
     * Realiza a criação do usuário dentro do banco de dados.
     */
    public function store(StoreRegistroRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            Registro::create($request->all());
            DB::commit();
        } catch (Exception $e){
            DB::roolBack();
            return redirect()->back();
        }

        return to_route('autenticacao.login');
    }
}
