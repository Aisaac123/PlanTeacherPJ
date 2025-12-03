<?php

namespace App\Filament\Resources\Asignaturas\RelationManagers;

use App\Filament\Resources\Estudiantes\EstudianteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class EstudiantesRelationManager extends RelationManager
{
    protected static string $relationship = 'estudiantes';

    protected static ?string $relatedResource = EstudianteResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
