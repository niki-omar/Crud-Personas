<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telefono' => $this->faker-> numberBetween(0,999999999),
            'telefonoTipo' => $this->faker->randomElement(['C', 'M']),
        ];
    }
}
