<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;
    protected $fillable = ['full_name', 'cin', 'email', 'password', 'phone_number'];

    protected $hidden = ['password'];
    public function adoptions() {
        return $this->hasMany(Adoption::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}