<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lease>
 */
class LeaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => \App\Models\Property::factory(),
            'tenant_id' => \App\Models\User::factory()->state(['role' => \App\Enums\UserRole::LOCATAIRE]),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'rent_amount' => fake()->numberBetween(500, 2000),
            'security_deposit' => fake()->numberBetween(500, 2000),
            'status' => 'active',
        ];
    }
}
