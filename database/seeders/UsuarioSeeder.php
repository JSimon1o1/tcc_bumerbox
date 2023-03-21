<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Exception;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    private static array $administradores = [
        ['nome' => 'Bumerbox', 'sobrenome' => 'Admin', 'data_nascimento' => '2023-03-01', 'cpfcnpj' => '101010', 'senha' => ''],
        ['nome' => 'Bumerbox', 'sobrenome' => 'Robot', 'data_nascimento' => '2023-03-01', 'cpfcnpj' => '1001001', 'senha' => ''],
    ];

    private function create($dados): UsuarioSeeder
    {
        $usuarioModel = Usuario::where('cpfcnpj', $dados['cpfcnpj'])->first();
        if (!$usuarioModel) {
            $usuarioModel = new Usuario();
        }

        try {
            $usuarioModel->fill($dados)->save();
        } catch (Exception $e) {
            $this->command->error($e->getMessage());
            $this->command->error(sprintf('Erro ao criar "%s" para "%s"', $dados['nome'], get_class($this)));
        }
        return $this;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$administradores as $administrador) {
            $this->create($administrador);
        }
    }
}
