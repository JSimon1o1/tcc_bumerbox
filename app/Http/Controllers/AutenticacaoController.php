<?php

namespace App\Http\Controllers;

use App\Traits\AutenticacaoTrait;

class AutenticacaoController extends Controller
{
    use AutenticacaoTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('autenticacao.login');
    }
}
