<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'veterinarian_id',
        'pet_name',
        'owner_name',
        'appointment_date',
        'appointment_time',
        'concern_notes',
        'dog_type',
        'dog_age',
        'status'
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
}

