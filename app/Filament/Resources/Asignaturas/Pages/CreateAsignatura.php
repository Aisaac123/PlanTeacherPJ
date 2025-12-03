<?php

namespace App\Filament\Resources\Asignaturas\Pages;

use App\Filament\Resources\Asignaturas\AsignaturaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAsignatura extends CreateRecord
{
    protected static string $resource = AsignaturaResource::class;

    public function getTitle(): string
    {
        return 'Crear Asignatura';
    }
    public static function getNavigationLabel(): string
    {
        return 'Registrar ' . static::$resource::getModelLabel();
    }
}
