<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Traits\AutenticacaoTrait;

class AutenticacaoController extends Controller
{
    use AutenticacaoTrait;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        return view('autenticacao.login');
    }
}
