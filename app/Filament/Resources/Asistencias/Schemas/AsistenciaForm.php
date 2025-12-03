<?php

namespace App\Filament\Resources\Asistencias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AsistenciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asignatura_id')
                    ->label('ID de la asignatura')
                    ->required()
                    ->numeric(),

                DatePicker::make('fecha')
                    ->label('Fecha de la asistencia')
                    ->required(),

                Toggle::make('finalizada')
                    ->label('Asistencia finalizada')
                    ->required(),
            ]);
    }
}
