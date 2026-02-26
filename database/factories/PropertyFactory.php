<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), 
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'type' => fake()->randomElement(['Appartement', 'Maison', 'Studio', 'Villa']),
            'surface' => fake()->numberBetween(20, 250),
            'price' => fake()->numberBetween(400, 3000),
            'furnished' => fake()->boolean(),
            'status' => fake()->randomElement(['available', 'rented', 'maintenance']),
        ];
    }
}
