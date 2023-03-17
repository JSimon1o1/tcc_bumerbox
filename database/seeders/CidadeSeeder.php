<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Exception;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    private static array $cidades_rs = [
        ['nome' => 'Bento Gonçalves', 'estado_codigo' => 'BR-RS'],
        ['nome' => 'Caxias do Sul', 'estado_codigo' => 'BR-RS'],
        ['nome' => 'Porto Alegre', 'estado_codigo' => 'BR-RS'],
        ['nome' => 'São Leopoldo', 'estado_codigo' => 'BR-RS'],
    ];

    private static array $cidades_sc = [
        ['nome' => 'Balneário Camboriú', 'estado_codigo' => 'BR-SC'],
        ['nome' => 'Garopaba', 'estado_codigo' => 'BR-SC'],
        ['nome' => 'Laguna', 'estado_codigo' => 'BR-SC'],
        ['nome' => 'Tubarão', 'estado_codigo' => 'BR-SC'],
    ];

    private static array $cidades_sp = [
        ['nome' => 'Campinas', 'estado_codigo' => 'BR-SP'],
        ['nome' => 'Guarulhos', 'estado_codigo' => 'BR-SP'],
        ['nome' => 'Osasco', 'estado_codigo' => 'BR-SP'],
        ['nome' => 'Sorocaba', 'estado_codigo' => 'BR-SP'],
    ];

    private static array $cidades_ar_b = [
        ['nome' => 'Adolfo Alsina', 'estado_codigo' => 'AR-B'],
        ['nome' => 'Lanús', 'estado_codigo' => 'AR-B'],
        ['nome' => 'Marco Paz', 'estado_codigo' => 'AR-B'],
        ['nome' => 'San Nicolás', 'estado_codigo' => 'AR-B'],
        ['nome' => 'Tigre', 'estado_codigo' => 'AR-B'],
    ];

    private static array $cidades_ar_x = [
        ['nome' => 'Marcos Juérez', 'estado_codigo' => 'AR-X'],
        ['nome' => 'Minas', 'estado_codigo' => 'AR-X'],
        ['nome' => 'Río Primero', 'estado_codigo' => 'AR-X'],
        ['nome' => 'Santa María', 'estado_codigo' => 'AR-X'],
        ['nome' => 'Totoral', 'estado_codigo' => 'AR-X'],
    ];

    private static array $cidades_ar_s = [
        ['nome' => 'Belgrano', 'estado_codigo' => 'AR-X'],
        ['nome' => 'Las Colinas', 'estado_codigo' => 'AR-X'],
        ['nome' => 'San Lorenzo', 'estado_codigo' => 'AR-X'],
        ['nome' => 'San Martin', 'estado_codigo' => 'AR-X'],
    ];

    private static array $cidades_uy_ar = [
        ['nome' => 'Colina Palma', 'estado_codigo' => 'UY-AR'],
        ['nome' => 'Diego Lamas', 'estado_codigo' => 'UY-AR'],
        ['nome' => 'Javier de Viana', 'estado_codigo' => 'UY-AR'],
        ['nome' => 'Siqueira', 'estado_codigo' => 'UY-AR'],
    ];

    private static array $cidades_uy_mo = [
        ['nome' => 'Montevidéu', 'estado_codigo' => 'UY-MO'],
    ];

    private static array $cidades_uy_sj = [
        ['nome' => 'Boca del Cufré', 'estado_codigo' => 'UY-SJ'],
        ['nome' => 'González', 'estado_codigo' => 'UY-SJ'],
        ['nome' => 'Juan Soler', 'estado_codigo' => 'UY-SJ'],
        ['nome' => 'Punta de Valdez', 'estado_codigo' => 'UY-SJ'],
        ['nome' => 'Vila Maria', 'estado_codigo' => 'UY-SJ'],
    ];

    private function create($dados): CidadeSeeder
    {
        $cidadeModel = Cidade::where('nome', 'like', '%' . $dados['nome'] . '%')->first();
        if (!$cidadeModel) {
            $cidadeModel = new Cidade();
        }
        try {
            $cidadeModel->fill($dados)->save();
        } catch (Exception $e) {
            $this->command->error($e->getMessage());
            $this->command->error(sprintf('Erro ao criar "%s" para "%s"', $dados['nome'], get_class($cidadeModel)));
        }
        return $this;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = array_merge(
            self::$cidades_rs,
            self::$cidades_sc,
            self::$cidades_sp,
            self::$cidades_ar_b,
            self::$cidades_ar_x,
            self::$cidades_ar_s,
            self::$cidades_uy_ar,
            self::$cidades_uy_mo,
            self::$cidades_uy_sj
        );

        foreach ($cidades as $cidade) {
            $this->create($cidade);
        }
    }
}
