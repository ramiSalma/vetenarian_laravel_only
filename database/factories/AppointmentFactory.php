<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Veterinarian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'veterinarian_id' => Veterinarian::factory(),
            'appointment_date' => $this->faker->date(),
            'appointment_time' => $this->faker->time('H:i'),
            'dog_type' => $this->faker->randomElement(['Labrador', 'Bulldog', 'Beagle', 'Poodle']),
            'dog_age' => $this->faker->numberBetween(1, 15),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'pet_name' => $this->faker->firstName(),
            'owner_name' => $this->faker->name(),
            'concern_notes' => $this->faker->sentence(),
        ];
    }
}
