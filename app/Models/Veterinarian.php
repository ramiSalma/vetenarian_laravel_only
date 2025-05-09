<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Veterinarian extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\VeterinarianFactory> */
    use HasFactory;
    protected $fillable = ['full_name', 'cin', 'email', 'password', 'phone_number'];
    
    // Add this accessor to handle both name and full_name
    public function getNameAttribute()
    {
        return $this->full_name;
    }
    
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
