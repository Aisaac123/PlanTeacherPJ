<?php

namespace App\Filament\Resources\Asignaturas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AsignaturaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('actividad_docente_id')
                    ->required()
                    ->numeric(),
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('grupo')
                    ->required(),
                TextInput::make('facultad')
                    ->required(),
                TextInput::make('limite_estudiantes')
                    ->required()
                    ->numeric(),
                TextInput::make('horas_practicas')
                    ->required()
                    ->numeric(),
                TextInput::make('horas_teoricas')
                    ->required()
                    ->numeric(),
            ]);
    }
}
