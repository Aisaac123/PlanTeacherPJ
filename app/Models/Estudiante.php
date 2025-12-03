<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'asignatura_id',
        'codigo',
        'nombre_completo',
        'correo',
    ];

    /* ------------------------------
       Relaciones
    -------------------------------*/

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function detalleAsistencias()
    {
        return $this->hasMany(DetalleAsistencia::class);
    }

    /* ------------------------------
       Eventos
    -------------------------------*/

    protected static function booted()
    {
        static::created(function ($estudiante) {
            $actividad = $estudiante->asignatura->actividadDocente;

            $actividad->total_estudiantes = Estudiante::whereHas('asignatura', function ($q) use ($actividad) {
                $q->where('actividad_docente_id', $actividad->id);
            })->count();

            $actividad->save();
        });
    }
}
