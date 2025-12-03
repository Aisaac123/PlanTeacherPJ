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
                    ->required()
                    ->numeric(),
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre_completo')
                    ->required(),
                TextInput::make('correo')
                    ->required(),
            ]);
    }
}
