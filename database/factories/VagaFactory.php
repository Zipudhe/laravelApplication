<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaga>
 */
class VagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'titulo' => Str::random(15),
            'empresa' => fake()->company(),
            'descricao' => fake()->text(),
            'localizacao' => fake()->address(),
            'requisitos' => json_encode(fake()->shuffleArray())
        ];
    }

    public function remote(): Factory {
        return $this->state(function(array $attributes) {
            return [
                'localizacao' => null
            ];
        });
    }
}
