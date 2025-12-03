<?php

namespace App\Filament\Resources\ActividadDocentes\Pages;

use App\Filament\Resources\ActividadDocentes\ActividadDocenteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActividadDocente extends CreateRecord
{
    protected static string $resource = ActividadDocenteResource::class;

    public function getTitle(): string
    {
        return 'Registrar Actividad del Docente';
    }
}
