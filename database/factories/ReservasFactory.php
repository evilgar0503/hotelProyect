<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservas>
 */
class ReservasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha_entrada = 1;
        $fecha_salida = 0;
        while(strtotime($fecha_entrada) >= strtotime($fecha_salida)) {
            $fecha_entrada = fake()->date();
            $fecha_salida = fake()->date();
        }
        return [
            'fecha_entrada' => $fecha_entrada,
            'fecha_salida' => $fecha_salida,
            'user_id' => fake()->numberBetween(1,35),
            'habitacion_id' => fake()->numberBetween(1,10),
            'precio_total' => fake()->randomFloat(2, 70, 1500)
        ];
    }
}
