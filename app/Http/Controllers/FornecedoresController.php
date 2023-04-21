<?php

namespace App\Http\Controllers;

class FornecedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('cliente.index')
            ->withTitulo('Listagem dos Fornecedores')
            ->withSubTitulo('Listagem com todos os Fornecedores do Sistema!')
            ->withClientes($clientes);
    }

    public function create()
    {
        return view('fornecedor.create')
            ->withTitulo('Cadastro de Fornecedores');
    }


    public function show(Usuario $cliente)
    {
        return view('cliente.show')
            ->withTitulo($cliente->nome)
            ->withSubTitulo('Os dados do fornecedor estão sendo exibidos abaixo!')
            ->withCliente($cliente);
    }

    public function edit(Usuario $cliente)
    {
        return view('cliente.edit')
            ->withTitulo($cliente->nome)
            ->withSubTitulo('Altere os dados do fornecedor abaixo!')
            ->withCliente($cliente);
    }

}
