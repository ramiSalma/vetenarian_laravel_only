<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    /** @use HasFactory<\Database\Factories\DogFactory> */
    use HasFactory;
    protected $fillable = ['name', 'type', 'age', 'status', 'image'];
}

