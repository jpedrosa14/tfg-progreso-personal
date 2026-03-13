<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadFisica extends Model
{
    protected $fillable = [
        'tipo',
        'duracion',
        'fecha',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
