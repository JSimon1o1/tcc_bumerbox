<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private static array $callersClass = [
        UsuarioSeeder::class,
        TipoPerfilSeeder::class,
        PerfilSeeder::class,
        PaisSeeder::class,
        EstadoSeeder::class,
        CidadeSeeder::class,
    ];

    public function run(): void
    {
        $this->call(self::$callersClass);
    }
}
