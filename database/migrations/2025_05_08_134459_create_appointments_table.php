<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('veterinarian_id')->constrained()->onDelete('cascade');

            $table->date('appointment_date'); 
            $table->time('appointment_time'); 

            $table->string('dog_type')->nullable();    
            $table->integer('dog_age')->nullable();     

            $table->string('pet_name')->nullable();   
            $table->string('owner_name')->nullable();   
            $table->text('concern_notes')->nullable();  
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
    
};

        



