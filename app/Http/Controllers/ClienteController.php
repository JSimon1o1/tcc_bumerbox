<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Usuario::select('*')
            ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
            ->orWhere('tipo_perfil_codigo', '=', 'CLT')
            ->where('visivel', true)
            ->paginate(10);

        return view('cliente.index')
            ->withTitulo('Listagem dos Clientes')
            ->withSubTitulo('Listagem com todos os Cliente do Sistema!')
            ->withClientes($clientes);
    }

    public function create()
    {
        return view('cliente.create')
            ->withTitulo('Cadastro de Clientes');
    }

    public function store(StoreClienteRequest $request, Usuario $cliente)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $cliente = $cliente->create($request->all());
            $cliente->enderecos()->create(['usuario_id' => $cliente->id, 'cidade_id' => 1]);
            $cliente->perfis()->create(['usuario_id' => $cliente->id, 'tipo_perfil_codigo' => 'CLT']);
            $cliente->telefones()->create(['usuario_id' => $cliente->id, 'numero' => $request->get('telefone')]);
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('message', "Não foi possível inserir o registro");
        }

        return to_route('clientes.show', $cliente->id)
            ->with('message', "Cliente $cliente->nome. Salvo com sucesso");
    }

    public function show(Usuario $cliente)
    {
        return view('cliente.show')
            ->withTitulo($cliente->nome)
            ->withSubTitulo('Os dados do cliente estão sendo exibidos abaixo!')
            ->withCliente($cliente);
    }

    public function edit(Usuario $cliente)
    {
        return view('cliente.edit')
            ->withTitulo("Editando $cliente->nome")
            ->withSubTitulo('Altere os dados do cliente abaixo!')
            ->withCliente($cliente);
    }

    public function update(UpdateClienteRequest $request, Usuario $cliente)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $cliente->update($request->all());

            if ($cliente->enderecos()->count()) {
                $cliente->enderecos()->update(['cep' => $request->get('cep'), 'rua' => $request->get('rua')]);
            } else {
                Endereco::create([
                    'usuario_id' => $cliente->id,
                    'cep' => $request->get('cep'),
                    'rua' => $request->get('rua'),
                    'numero' => 0,
                    'cidade_id' => 1,
                ]);
            }

            if ($cliente->telefones()->count()) {
                $cliente->telefones()->update(['numero' => $request->get('telefone')]);
            } else {
                Telefone::create([
                    'usuario_id' => $cliente->id,
                    'numero' => $request->get('telefone')
                ]);
            }
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('clientes.show', $cliente->id);
    }

    public function destroy(Usuario $cliente)
    {
        try {
            DB::beginTransaction();
            $cliente->telefones()->delete();
            $cliente->enderecos()->delete();
            $cliente->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back();
        }

        return to_route('clientes.index');
    }
}
