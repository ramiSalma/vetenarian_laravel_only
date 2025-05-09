<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veterinarian>
 */
class VeterinarianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name'    => $this->faker->name(),
            'cin'          => strtoupper(Str::random(6)), // Example CIN like 'AB1234'
            'email'        => $this->faker->unique()->safeEmail(),
            'password'     => Hash::make('password'), // default password
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
