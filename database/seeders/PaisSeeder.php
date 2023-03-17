<?php

namespace Database\Seeders;

use App\Models\Pais;
use Exception;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    private static array $paises = [
        ['nome' => 'Argentina', 'codigo' => 'AR'],
        ['nome' => 'Brasil', 'codigo' => 'BR'],
        ['nome' => 'Uruguai', 'codigo' => 'UY'],
    ];

    private function create($dados): PaisSeeder
    {
        $paisModel = Pais::where('codigo', $dados['codigo'])->first();
        if (!$paisModel) {
            $paisModel = new Pais();
        }
        try {
            $paisModel->fill($dados)->save();
        } catch (Exception $e) {
            $this->command->error($e->getMessage());
            $this->command->error(sprintf('Erro ao criar "%s" para "%s"', $dados['nome'], get_class($paisModel)));
        }
        return $this;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$paises as $pais) {
            $this->create($pais);
        }
    }

}
