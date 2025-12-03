<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutoria extends Model
{
    protected $table = 'tutorias';
    protected $fillable = [
        'asignatura_id',
        'fecha',
        'horas',
    ];

    protected $casts = [
        'fecha' => 'date',
        'horas' => 'integer',
    ];

    /* ------------------------------
       Relaciones
    -------------------------------*/

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
