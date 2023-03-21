<?php

namespace Database\Seeders;

use App\Models\Estado;
use Exception;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    private static array $estadosBR = [
        ['nome' => 'Rio Grande do Sul', 'pais_codigo' => 'BR', 'codigo' => 'BR-RS'],
        ['nome' => 'Santa Catarina', 'pais_codigo' => 'BR', 'codigo' => 'BR-SC'],
        ['nome' => 'São Paulo', 'pais_codigo' => 'BR', 'codigo' => 'BR-SP']
    ];

    private static array $estadosAR = [
        ['nome' => 'Buenos Aires', 'pais_codigo' => 'AR', 'codigo' => 'AR-B'],
        ['nome' => 'Córdoba', 'pais_codigo' => 'AR', 'codigo' => 'AR-X'],
        ['nome' => 'Santa Fé', 'pais_codigo' => 'AR', 'codigo' => 'AR-S']
    ];


    private static array $estadosUY = [
        ['nome' => 'Artigas', 'pais_codigo' => 'UY', 'codigo' => 'UY-AR'],
        ['nome' => 'Montevidéu', 'pais_codigo' => 'UY', 'codigo' => 'UY-MO'],
        ['nome' => 'San José', 'pais_codigo' => 'UY', 'codigo' => 'UY-SJ'],
    ];

    private function create($dados): EstadoSeeder
    {
        $estadoModel = Estado::where('codigo', $dados['codigo'])->first();
        if (!$estadoModel) {
            $estadoModel = new Estado();
        }
        try {
            $estadoModel->fill($dados)->save();
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
        $estados = array_merge(self::$estadosBR, self::$estadosAR, self::$estadosUY);
        foreach ($estados as $estado) {
            $this->create($estado);
        }
    }
}
