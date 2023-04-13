<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreMinhaContaRequest;
use Request;
use DB;
use Log;
use Auth;
use AutenticacaoTrait;

class MinhaContaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Usuario $usuario)
    {
        return view('minhaconta.show')
            ->withTitulo('Alterar Senha')
            ->withUsuario($usuario);
    }

    public function update(StoreMinhaContaRequest $request, Usuario $usuario)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $usuario = Auth::user();
            $usuario->senha = bcrypt($request->get('nova_senha'));
            $usuario->save();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }
        return to_route('logout');
    }
}
