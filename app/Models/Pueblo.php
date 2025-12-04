<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pueblo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'image',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    /**
     * Relación: un pueblo tiene muchos eventos.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

