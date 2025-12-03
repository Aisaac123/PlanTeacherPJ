<?php

namespace App\Filament\Resources\Asignaturas\Pages;

use App\Filament\Resources\Asignaturas\AsignaturaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAsignatura extends EditRecord
{
    protected static string $resource = AsignaturaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Editar Asignatura';
    }

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }
}
