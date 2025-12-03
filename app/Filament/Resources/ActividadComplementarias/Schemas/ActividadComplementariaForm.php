<?php

namespace App\Filament\Resources\ActividadComplementarias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActividadComplementariaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('horas_trabajos_grado')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_investigacion')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_proyeccion_social')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_cooperacion')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_crecimiento')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_administrativas')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_otras')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('horas_compartidas')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
