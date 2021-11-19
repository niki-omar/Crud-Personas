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
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'cedula' => $this->faker-> numberBetween(0,9999999999),
            'correo' => $this->faker->email(),
            'direccion' => $this->faker->address(),
            'sexo' => $this->faker->randomElement(['male', 'female']),
            'descripcion' => $this->faker->paragraph(),
        ];
    }
}
