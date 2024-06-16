<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    protected $model = \App\Models\Libro::class;

    public function definition()
    {
        return [
            'codigo_libro' => $this->faker->unique()->numberBetween(1, 100),
            'nombre_libro' => $this->faker->sentence,
            'año' => $this->faker->year,
            'autor' => $this->faker->name,
            'editorial' => $this->faker->company,
            'disponible' => $this->faker->boolean,
        ];
    }
}
