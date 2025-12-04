<?php

namespace App\Observers;

use App\Models\Tutoria;

class TutoriaObserver
{
    /**
     * Handle the Tutoria "created" event.
     */
    public function created(Tutoria $tutoria): void
    {
        // Obtener todos los estudiantes de la asignatura
        $estudiantes = $tutoria->asignatura->estudiantes;
        // Crear un detalle de tutoría para cada estudiante
        foreach ($estudiantes as $estudiante) {
            $tutoria->detalles()->create([
                'estudiante_id' => $estudiante->id,
                'asistio' => false,
            ]);
        }
    }

    /**
     * Handle the Tutoria "updated" event.
     */
    public function updated(Tutoria $tutoria): void
    {
        //
    }

    /**
     * Handle the Tutoria "deleted" event.
     */
    public function deleted(Tutoria $tutoria): void
    {
        //
    }

    /**
     * Handle the Tutoria "restored" event.
     */
    public function restored(Tutoria $tutoria): void
    {
        //
    }

    /**
     * Handle the Tutoria "force deleted" event.
     */
    public function forceDeleted(Tutoria $tutoria): void
    {
        //
    }
}
