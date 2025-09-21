<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculo>
 */
class CurriculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->email(),
            'telefone' => fake()->phoneNumber(),
            'cargo_desejado' => fake()->jobTitle(),
            'escolaridade' => fake()->name(),
            'observacoes' => fake()->realText(),
            'caminho_arquivo' => fake()->filePath(),
            'ip_visitante' => fake()->ipv4(),
        ];
    }
}
