<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            ->withSubTitulo('Alterar senha');
    }

    public function update(Request $request, string $id)
    {
    }
}
