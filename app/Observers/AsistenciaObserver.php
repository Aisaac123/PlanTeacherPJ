<?php

namespace App\Observers;

use App\Models\Asistencia;

class AsistenciaObserver
{
    /**
     * Handle the Asistencia "created" event.
     */
    public function created(Asistencia $asistencia): void
    {
        // Obtener todos los estudiantes de la asignatura
        $estudiantes = $asistencia->asignatura->estudiantes;

        // Crear un detalle de asistencia para cada estudiante
        foreach ($estudiantes as $estudiante) {
            $asistencia->detalles()->create([
                'estudiante_id' => $estudiante->id,
                'asistio' => false,
            ]);
        }
    }

    /**
     * Handle the Asistencia "updated" event.
     */
    public function updated(Asistencia $asistencia): void
    {
        //
    }

    /**
     * Handle the Asistencia "deleted" event.
     */
    public function deleted(Asistencia $asistencia): void
    {
        //
    }

    /**
     * Handle the Asistencia "restored" event.
     */
    public function restored(Asistencia $asistencia): void
    {
        //
    }

    /**
     * Handle the Asistencia "force deleted" event.
     */
    public function forceDeleted(Asistencia $asistencia): void
    {
        //
    }
}
