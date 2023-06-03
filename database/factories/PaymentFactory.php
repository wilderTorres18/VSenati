<?php

namespace Database\Factories;
use App\Models\Job;
use App\Models\Payment_method;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'monto'=>fake()->randomFloat(2,10,200),
            'job_id'=>Job::factory()->create()->id,
            'payment_method_id'=>Payment_method::all()->random()->id,
            'fecha_pago'=>fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
