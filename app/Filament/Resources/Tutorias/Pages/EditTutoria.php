<?php

namespace App\Filament\Resources\Tutorias\Pages;

use App\Filament\Resources\Tutorias\TutoriaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTutoria extends EditRecord
{
    protected static string $resource = TutoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Editar Tutoría';
    }

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }
}
