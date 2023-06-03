<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machinery>
 */
class MachineryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'nombre'=>fake()->word(),
          'fecha_compra'=>fake()->dateTimeBetween('-6 month', 'now'),
          'valor'=>fake()->randomFloat(2,1000,10000)
        ];
    }
}
