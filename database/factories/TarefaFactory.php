<?php

namespace Database\Factories;

use App\Enums\StatusTarefa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'descricao' => fake()->optional()->paragraph(),
            'status' => StatusTarefa::PENDENTE->value,
            'user_id' => User::factory(),
        ];
    }

    public function pendente(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => StatusTarefa::PENDENTE->value,
        ]);
    }

    public function concluida(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => StatusTarefa::CONCLUIDA->value,
        ]);
    }
}