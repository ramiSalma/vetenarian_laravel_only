<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'cin' => strtoupper($this->faker->bothify('??######')),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
