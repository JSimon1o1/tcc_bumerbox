<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Models\Registro;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegistroController extends Controller
{
    public function index()
    {
        return to_route('registro.create');
    }

    public function create()
    {
        return view('registro.create')
            ->withTitulo('Registro de usuário')
            ->withSubTitulo('Realize seu cadastro para acessar o sistema!')
            ->withFakeAuth(false);
    }

    public function store(StoreRegistroRequest $request)
    {
        $request->validated();
        try {
            DB::beginTransaction();
            Registro::create($request->except('confirmar_senha'));
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back();
        }

        return to_route('autenticacao.login');
    }
}
