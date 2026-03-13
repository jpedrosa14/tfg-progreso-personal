<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroHabito extends Model
{
    protected $table = 'registro_habitos';

    protected $fillable = [
        'habito_id',
        'fecha',
        'completado',
    ];

    public function habito()
    {
        return $this->belongsTo(Habito::class);
    }
}
