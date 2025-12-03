<?php

namespace App\Filament\Resources\ActividadComplementarias\Pages;

use App\Filament\Resources\ActividadComplementarias\ActividadComplementariaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActividadComplementaria extends CreateRecord
{
    protected static string $resource = ActividadComplementariaResource::class;

    public static function getNavigationLabel(): string
    {
        return 'Registrar ' . static::$resource::getModelLabel();
    }
}
