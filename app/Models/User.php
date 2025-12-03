<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * Atributos asignables en masa.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atributos ocultos.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts modernos.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* -----------------------------------------------------------
     |  RELACIONES DOCENTE ↔ SISTEMA ACADÉMICO
     |-----------------------------------------------------------
     */

    /**
     * Actividades docentes del profesor.
     */
    public function actividadesDocentes(): HasMany
    {
        return $this->hasMany(ActividadDocente::class, 'user_id');
    }

    /**
     * Asignaturas dictadas por el docente.
     */
    public function asignaturas(): HasMany
    {
        return $this->hasMany(Asignatura::class, 'user_id');
    }

    /**
     * Estudiantes asignados al docente.
     */
    public function estudiantes(): HasMany
    {
        return $this->hasMany(Estudiante::class, 'user_id');
    }

    /**
     * Asistencias registradas por el docente.
     */
    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencia::class, 'user_id');
    }

    /**
     * Tutorías realizadas por el docente.
     */
    public function tutorias(): HasMany
    {
        return $this->hasMany(Tutoria::class, 'user_id');
    }
}
