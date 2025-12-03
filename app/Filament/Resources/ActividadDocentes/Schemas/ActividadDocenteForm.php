<?php

namespace App\Filament\Resources\ActividadDocentes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActividadDocenteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('total_asignaturas')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_grupos')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_estudiantes')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_docencia_directa')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_tutorias')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_preparacion')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_asignaturas')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
