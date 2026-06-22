<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'dateIni',
        'dateFin',
        'cartel',
        'pueblo_id'
    ];

    /**
     * Relación: un evento pertenece a un pueblo.
     */
    public function pueblo()
    {
        return $this->belongsTo(Pueblo::class);
    }

}
