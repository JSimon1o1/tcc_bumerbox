<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroRequest;
use App\Models\Usuario;
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
            ->withSubTitulo('Realize seu cadastro para acessar o sistema!');
    }

    public function store(StoreRegistroRequest $request)
    {
        $request->validated();
        try {
            DB::beginTransaction();
            Usuario::create($request->except('confirmar_senha'));
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back();
        }

        return to_route('login');
    }
}
