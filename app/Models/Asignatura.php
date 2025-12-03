<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = [
        'actividad_docente_id',
        'codigo',
        'nombre',
        'grupo',
        'facultad',
        'limite_estudiantes',
        'horas_practicas',
        'horas_teoricas',
    ];

    protected $casts = [
        'limite_estudiantes' => 'integer',
        'horas_practicas' => 'integer',
        'horas_teoricas' => 'integer',
    ];

    /* ------------------------------
       Relaciones
    -------------------------------*/

    public function actividadDocente()
    {
        return $this->belongsTo(ActividadDocente::class);
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function tutorias()
    {
        return $this->hasMany(Tutoria::class);
    }

    /* ------------------------------
       Eventos
    -------------------------------*/

    protected static function booted()
    {
        static::created(function ($asignatura) {
            // Recalcular totales
            $actividad = $asignatura->actividadDocente;

            $actividad->total_grupos = $actividad->asignaturas()
                ->distinct('grupo')
                ->count('grupo');

            $actividad->save();
        });
    }
}
