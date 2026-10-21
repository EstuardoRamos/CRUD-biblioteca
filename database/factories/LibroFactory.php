<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'titulo'=>fake()->sentence(3, true),
            'isbn'=>fake()->boolean(70)? fake()->unique()->isbn13(): null,
            'anio_publicacion' => fake()->numberBetween(1950, (int) date('Y')),
            //'anio_publicacion' => fake()->numberBetween(1950, (int)date('Y')),
            'paginas'=>fake()->numberBetween(50, 1000),
            'disponible'=>fake()->boolean(80),
            'autor_id'=>Autor::factory(),
        ];
    }
}
