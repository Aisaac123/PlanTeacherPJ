<?php

namespace App\Filament\Resources\Asistencias\Pages;

use App\Filament\Resources\Asistencias\AsistenciaResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EditAsistencia extends EditRecord
{
    protected static string $resource = AsistenciaResource::class;

    protected $listeners = ['$refresh' => '$refresh'];

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // Opcional: Refrescar el formulario completo
    public function refreshForm(): void
    {
        $this->form->fill();
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Si finalizas la asistencia, ya no se puede editar
        return $data;
    }
    public function getTitle(): string
    {
        return 'Editar Asistencia';
    }

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->disabled(fn () => $this->record->finalizada);
    }
}
