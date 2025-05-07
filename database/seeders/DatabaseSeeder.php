<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        \App\Models\Dog::factory(100)->create();
        
        \App\Models\Administrator::create([
            'name' => 'Admin',
            'email' => 'admin@local.test',
            'password' => hash::make('password123')
        ]);
        \App\Models\Veterinarian::create([
            'full_name' => 'Dr. Vet',
            'cin' => 'AB122345',
            'email' => 'vet@local.test',
            'password' => bcrypt('vet123'),
            'phone_number' => '0613547753'
        ]);
        \App\Models\Client::create([
            'full_name' => 'jack sparrow',
            'cin' => 'AE944345',
            'email' => 'jack@local.test',
            'password' => bcrypt('clt123'),
            'phone_number' => '0613547753'
        ]);
    }
}
