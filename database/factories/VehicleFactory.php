<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'placa'=>strtoupper(Str::random(3).'-'.Str::random(3)),
            'modelo'=>$this->faker->word(),
            'color'=>$this->faker->safeColorName()
        ];
    }
}
