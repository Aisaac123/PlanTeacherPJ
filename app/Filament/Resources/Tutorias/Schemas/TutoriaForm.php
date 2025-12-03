<?php

namespace App\Filament\Resources\Tutorias\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TutoriaForm
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
                    ->label('Fecha de la tutoría')
                    ->required(),

                TextInput::make('horas')
                    ->label('Horas dedicadas a la tutoría')
                    ->required()
                    ->numeric(),
            ]);
    }
}
