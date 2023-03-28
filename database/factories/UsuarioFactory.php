<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    protected function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cpfcnpj = $this->faker->boolean ? $this->faker->unique()->cpf(false) : $this->faker->unique()->cnpj(false);

        return [
            'nome' => $this->faker->firstName,
            'data_nascimento' => $this->faker->boolean ? $this->faker->date : null,
            'cpfcnpj' => $cpfcnpj,
            'senha' => $this->faker->password,
            'fidelizado' => $this->faker->boolean,
        ];
    }
}
