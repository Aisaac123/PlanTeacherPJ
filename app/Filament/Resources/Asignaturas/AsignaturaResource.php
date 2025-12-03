<?php

namespace App\Filament\Resources\Asignaturas;

use App\Filament\Resources\Asignaturas\Pages\CreateAsignatura;
use App\Filament\Resources\Asignaturas\Pages\EditAsignatura;
use App\Filament\Resources\Asignaturas\Pages\ListAsignaturas;
use App\Filament\Resources\Asignaturas\RelationManagers\AsistenciasRelationManager;
use App\Filament\Resources\Asignaturas\RelationManagers\EstudiantesRelationManager;
use App\Filament\Resources\Asignaturas\RelationManagers\TutoriasRelationManager;
use App\Filament\Resources\Asignaturas\Schemas\AsignaturaForm;
use App\Filament\Resources\Asignaturas\Tables\AsignaturasTable;
use App\Models\Asignatura;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AsignaturaResource extends Resource
{
    protected static ?string $model = Asignatura::class;

    protected static ?string $modelLabel = 'Asignatura';

    protected static ?string $pluralModelLabel = 'Asignaturas';

    protected static ?string $navigationLabel = 'Asignaturas';

    protected static string|null|\UnitEnum $navigationGroup = 'Gestión Académica';

    protected static string|null|BackedEnum $navigationIcon = 'heroicon-o-book-open';

    public static function canAccess(): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        return $user->actividadesDocentes()->exists();
    }

    protected static ?string $recordTitleAttribute = 'Asignaturas';

    public static function form(Schema $schema): Schema
    {
        return AsignaturaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AsignaturasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            EstudiantesRelationManager::class,
            AsistenciasRelationManager::class,
            TutoriasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAsignaturas::route('/'),
            'create' => CreateAsignatura::route('/create'),
            'edit' => EditAsignatura::route('/{record}/edit'),
        ];
    }
}
