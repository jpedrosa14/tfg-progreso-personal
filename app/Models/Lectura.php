<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
