<?php

namespace App\Filament\Resources\Tutorias\Pages;

use App\Filament\Resources\Tutorias\TutoriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTutoria extends CreateRecord
{
    protected static string $resource = TutoriaResource::class;

    public function getTitle(): string
    {
        return 'Registrar Tutoría';
    }

    public static function getNavigationLabel(): string
    {
        return 'Registrar '.static::$resource::getModelLabel();
    }
}
