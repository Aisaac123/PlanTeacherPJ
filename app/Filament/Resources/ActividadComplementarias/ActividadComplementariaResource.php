<?php

namespace App\Filament\Resources\ActividadComplementarias;

use App\Filament\Resources\ActividadComplementarias\Pages\CreateActividadComplementaria;
use App\Filament\Resources\ActividadComplementarias\Pages\EditActividadComplementaria;
use App\Filament\Resources\ActividadComplementarias\Pages\ListActividadComplementarias;
use App\Filament\Resources\ActividadComplementarias\Schemas\ActividadComplementariaForm;
use App\Filament\Resources\ActividadComplementarias\Tables\ActividadComplementariasTable;
use App\Models\ActividadComplementaria;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActividadComplementariaResource extends Resource
{
    protected static ?string $model = ActividadComplementaria::class;
    protected static ?string $modelLabel = 'Actividad Complementaria';
    protected static ?string $pluralModelLabel = 'Actividades Complementarias';

    protected static ?string $navigationLabel = 'Actividades Complementarias';
    protected static string|null|\UnitEnum $navigationGroup = 'Gestión Académica';

    protected static string|null|BackedEnum $navigationIcon = 'heroicon-o-queue-list';


    protected static ?string $recordTitleAttribute = 'Actividades Complementarias';

    public static function form(Schema $schema): Schema
    {
        return ActividadComplementariaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActividadComplementariasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListActividadComplementarias::route('/'),
            'create' => CreateActividadComplementaria::route('/create'),
            'edit' => EditActividadComplementaria::route('/{record}/edit'),
        ];
    }
}
