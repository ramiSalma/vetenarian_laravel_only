<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    /** @use HasFactory<\Database\Factories\AdoptionFactory> */
    use HasFactory;
    protected $fillable = ['client_id', 'dog_id', 'adopted_at'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function dog() {
        return $this->belongsTo(Dog::class);
    }
}
