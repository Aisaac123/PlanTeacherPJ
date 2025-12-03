<?php

namespace App\Filament\Resources\Estudiantes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstudianteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asignatura_id')
                    ->label('ID de la asignatura')
                    ->required()
                    ->numeric(),

                TextInput::make('codigo')
                    ->label('ID del estudiante')
                    ->required(),

                TextInput::make('nombre_completo')
                    ->label('Apellidos y nombres del estudiante')
                    ->required(),

                TextInput::make('correo')
                    ->label('Correo institucional del estudiante')
                    ->required(),
            ]);
    }
}
