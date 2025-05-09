<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Veterinarian;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Administrator;
use App\Models\Dog;
use App\Models\Adoption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Make sure storage link exists
        $this->createStorageLink();
        
        // Recreate dogs with proper images
        Dog::factory(100)->create();
 
        Administrator::create([
            'name' => 'Admin',
            'email' => 'admin@local.test',
            'password' => Hash::make('password123')
        ]);
        
        // Create main veterinarian account
        Veterinarian::create([
            'full_name' => 'Dr. Vet',
            'cin' => 'AB122345',
            'email' => 'vet@local.test',
            'password' => bcrypt('vet123'),
            'phone_number' => '0613547753'
        ]);
        
        // Create 10 more veterinarians (total 11)
        Veterinarian::factory()->count(10)->create();
        
        // Create clients
        Client::create([
            'full_name' => 'jack sparrow',
            'cin' => 'AE944345',
            'email' => 'jack@local.test',
            'password' => bcrypt('clt123'),
            'phone_number' => '0613547753'
        ]);
        
        // Create more clients
        Client::factory()->count(20)->create();

        // Create appointments with random veterinarians
        Appointment::factory()->count(70)->create([
            'veterinarian_id' => function() {
                return Veterinarian::inRandomOrder()->first()->id;
            },
            'client_id' => function() {
                return Client::inRandomOrder()->first()->id;
            }
        ]);
        
        // Create adoptions
        // 15 approved adoptions
        Adoption::factory()->count(15)->approved()->create([
            'client_id' => function() {
                return Client::inRandomOrder()->first()->id;
            },
            'dog_id' => function() {
                // Get a dog that's not already adopted
                $dog = Dog::where('status', 'available')->inRandomOrder()->first();
                if ($dog) {
                    // Update dog status to adopted
                    $dog->update(['status' => 'adopted']);
                    return $dog->id;
                }
                return Dog::factory()->create(['status' => 'adopted'])->id;
            }
        ]);
        
        // 10 pending adoptions
        Adoption::factory()->count(10)->pending()->create([
            'client_id' => function() {
                return Client::inRandomOrder()->first()->id;
            },
            'dog_id' => function() {
                // Get a dog that's not already adopted
                return Dog::where('status', 'available')->inRandomOrder()->first()->id ?? 
                       Dog::factory()->create(['status' => 'available'])->id;
            }
        ]);
        
        // 5 rejected adoptions
        Adoption::factory()->count(5)->rejected()->create([
            'client_id' => function() {
                return Client::inRandomOrder()->first()->id;
            },
            'dog_id' => function() {
                // Get a dog that's not already adopted
                return Dog::where('status', 'available')->inRandomOrder()->first()->id ?? 
                       Dog::factory()->create(['status' => 'available'])->id;
            }
        ]);
    }

    /**
     * Create storage link if it doesn't exist
     */
    protected function createStorageLink()
    {
        $targetPath = storage_path('app/public');
        $linkPath = public_path('storage');
        
        if (!file_exists($linkPath)) {
            if (file_exists($linkPath)) {
                unlink($linkPath);
            }
            
            symlink($targetPath, $linkPath);
        }
    }
}




