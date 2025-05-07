<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dog>
 */
class dogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['Labrador', 'Husky', 'Bulldog']),
            'age' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['available', 'adopted']),
            'image' => 'https://placedog.net/400/300?id=' . $this->faker->unique()->numberBetween(1, 100), 
        ]; 
    }
}
