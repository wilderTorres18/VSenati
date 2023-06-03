<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee_role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'nombre'=>fake()->name(),
          'DNI'=>(string)fake()->randomDigit().(string)fake()->randomNumber(6, true),
          'celular'=>"9".(string)fake()->randomNumber(8, true),
          'employee_role_id'=>Employee_role::all()->random()->id,
          'fecha_contrato'=>fake()->dateTimeBetween('-1 year', 'now'),
          'fecha_finalizacion'=>fake()->randomElement([fake()->dateTimeBetween('-1 month', 'now'), Null, Null, Null])
        ];
    }
}
