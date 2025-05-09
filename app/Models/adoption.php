<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'dog_id',
        'notes',
        'status',
        'adopted_at'
    ];

    protected $casts = [
        'adopted_at' => 'datetime',
    ];

    /**
     * Get the client associated with the adoption.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the dog associated with the adoption.
     */
    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }
}


