<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;
    protected $fillable = ['client_id', 'veterinarian_id', 'date', 'status'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function veterinarian() {
        return $this->belongsTo(Veterinarian::class);
    }
}
