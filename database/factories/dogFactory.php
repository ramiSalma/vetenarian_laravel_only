<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        // Create dogs directory if it doesn't exist
        if (!Storage::disk('public')->exists('dogs')) {
            Storage::disk('public')->makeDirectory('dogs');
        }
        
        // Use a local placeholder image or copy from a URL
        $dogId = $this->faker->unique()->numberBetween(1, 100);
        $imagePath = "dogs/dog_{$dogId}.jpg";
        
        // Copy a placeholder image if it doesn't exist
        if (!Storage::disk('public')->exists($imagePath)) {
            // Option 1: Copy from a URL (requires allow_url_fopen to be enabled)
            $imageUrl = "https://placedog.net/400/300?id={$dogId}";
            $imageContent = @file_get_contents($imageUrl);
            
            if ($imageContent) {
                Storage::disk('public')->put($imagePath, $imageContent);
            }
        }
        
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['Labrador', 'Husky', 'Bulldog']),
            'age' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['available', 'adopted']),
            'image' => $imagePath,
        ]; 
    }
}

