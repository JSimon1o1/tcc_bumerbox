<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    private static array $administradores = [
        [
            'nome' => 'Administrador',
            'senha' => '@dm1n1str@d0r',

            'visivel' => false
        ],
    ];

    private function create($dados): UsuarioSeeder
    {
        $faker = Factory::create('pt_BR');
        $dados['cpfcnpj'] = $faker->unique()->cpf(false);
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
