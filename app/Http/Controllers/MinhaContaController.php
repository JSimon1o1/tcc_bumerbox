<?php

namespace App\Http\Controllers;

use App\Http\Requests\MinhaConta\StoreMinhaContaRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MinhaContaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(int $id)
    {
        return view('minhaconta.edit')
            ->withTitulo('Alterar Senha')
            ->withUsuarioId($id);
    }

    public function update(StoreMinhaContaRequest $request, int $usuarioId)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $usuario = Usuario::find($usuarioId);
            $usuario->senha = $request->get('nova_senha');
            $usuario->save();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->withErrors('Não foi possível alterar a senha.');
        }
        return to_route('logout')->withSuccess('Senha alterada com sucesso! Por favor, efetue o login novamente.');
    }
}
