<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Database\Factories\UsuarioFactory;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    private static array $administradores = [
        [
            'nome' => 'Administrador',
            'cpfcnpj' => '34885401704'
        ],
    ];

    private function create($dados): UsuarioSeeder
    {
        $faker = Factory::create('pt_BR');
        $usuarioModel = Usuario::where('cpfcnpj', $dados['cpfcnpj'])->first();
        if (!$usuarioModel) {
            $usuarioModel = new Usuario();
        }

        try {
            $dados['senha'] = $faker->password(false);
            $usuarioModel->fill($dados)->save();
        } catch (Exception $e) {
            $this->command->error($e->getMessage());
            $this->command->error(sprintf('Erro ao criar "%s" para "%s"', $dados['nome'], get_class($this)));
        }

        /*
         * Popular banco com dados se necessário
         * (new UsuarioFactory())->count(10)->create();
         * */

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
