<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habito extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'frecuencia',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registros()
    {
        return $this->hasMany(RegistroHabito::class);
    }
}
