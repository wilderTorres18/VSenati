<?php

namespace Database\Factories;

use App\Models\Machinery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machinery_maintenance>
 */
class Machinery_maintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'descripcion'=>fake()->text(),
          'fecha_reparacion'=>fake()->dateTimeBetween('-1 month', 'now'),
          'costo'=>fake()->randomNumber(3, false),
          'machinery_id'=>Machinery::all()->random()->id
        ];
    }
}
