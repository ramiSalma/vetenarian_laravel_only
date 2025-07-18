<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class Administrator extends Authenticatable
{
    use  Notifiable, HasFactory;


    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];
}
