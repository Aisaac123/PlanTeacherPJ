<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleAsistencia extends Model
{
    protected $fillable = [
        'asistencia_id',
        'estudiante_id',
        'asistio',
    ];

    protected $casts = [
        'asistio' => 'boolean',
    ];

    /* ------------------------------
       Relaciones
    -------------------------------*/

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
