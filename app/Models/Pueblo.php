<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pueblo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude'
    ];

    /**
     * Relación: un pueblo tiene muchos eventos.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

