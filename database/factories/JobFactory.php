<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Default_job;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobl>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'employee_id'=>Employee::all()->random()->id,
          'descripcion_detalles'=>fake()->text(),
          'default_job_id'=>Default_job::all()->random()->id,
          'vehicle_id'=>Vehicle::all()->random()->id,
          'fecha'=>fake()->dateTimeBetween('-6 month', 'now'),
        ];
    }
}
