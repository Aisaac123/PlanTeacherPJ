<?php

namespace App\Filament\Resources\Asignaturas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AsignaturasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('nombre')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('grupo')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('facultad')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('limite_estudiantes')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('horas_practicas')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('horas_teoricas')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
