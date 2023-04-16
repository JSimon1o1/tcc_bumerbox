<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create')
            ->withTitulo('Registro de usuário')
            ->withSubTitulo('Realize seu cadastro para acessar o sistema!');
    }

    public function store(StoreRegistroRequest $request)
    {
        $request->validated();
        try {
            DB::beginTransaction();
            $usuario = Usuario::create($request->except('confirmar_senha'));
            $usuario->perfis()->create(['usuario_id' => $usuario->id, 'tipo_perfil_codigo' => 'USR']);
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->withErrors('Não foi possível efetuar o registro!');
        }

        return to_route('login')->withSuccess('Registro realizado com sucesso!');
    }
}
