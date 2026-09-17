<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = rtrim(fake()->sentence(3), '.');

        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo).'-'.fake()->unique()->numberBetween(1, 99999),
            'descripcion' => fake()->paragraph(),
            'fecha' => fake()->dateTimeBetween('now', '+3 months'),
            'lugar' => fake()->randomElement(['Paraninfo Central', 'Coliseo Universitario', 'Aula magna Informatica', 'Paraninfo CCPP']),
            'cupo' => fake()->numberBetween(50, 500),
            'precio' => fake()->randomElement([0, 15, 25, 40, 60]),
            'publicado' => fake()->boolean(80),
            'destacado' => fake()->boolean(20),
        ];
    }
}
