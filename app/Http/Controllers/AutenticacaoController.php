<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function login()
    {
        return view('autenticacao.login')
            ->withFakeAuth(false);
    }

    public function logout()
    {
        return view('autenticacao.login');
    }

    public function autenticar(Request $request)
    {
        /**
         * Fake
         * todo: implementar atuenticacao
         */
        if ($request->get('cpfcnpj') == '01234567890' && $request->get('senha') == '123456') {
            return to_route('home.index');
        }

        return redirect()
            ->back()
            ->withErrors('Usuario ou senha inválidos');
    }
}
