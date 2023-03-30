<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function edit(Usuario $usuario)
    {
        return view('conta.editar')
            ->withTitulo('Conta')
            ->withSubTitulo('Alterar senha');
    }

    public function update(Request $request, string $id)
    {
    }
}
