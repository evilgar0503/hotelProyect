<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
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
            'nombre' => $this->faker->words(2, true),
            'camas'=> $this->faker->randomElement([1,2,3]),
            'numero_habitacion' => $this->faker->numerify(),
            'planta' => $this->faker->numberBetween(1, 7),
            'foto' => $this->faker->randomElement(['https://hotelprincipepio.com/backoffice/images/165-doble-standard.7.jpg', 'https://hotelprincipepio.com/backoffice/images/173-doble-vistas.3a.jpg', 'https://hotelprincipepio.com/backoffice/images/219-suite-8a-802.2.jpg', 'https://hotelprincipepio.com/backoffice/images/175-doble-vistas.6.jpg', 'https://hotelprincipepio.com/backoffice/images/172-doble-vistas.3.jpg']),
            'precio' => $this->faker->randomFloat(2, 50, 120)

        ];
    }
}
