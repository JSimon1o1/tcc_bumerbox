<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('conta.editar')
            ->withTitulo('Conta')
            ->withSubTitulo('Alterar senha')
            ->withUsuario(Auth::user());
    }

    public function update(Request $request, Usuario $usuario)
    {
        //
    }
}
