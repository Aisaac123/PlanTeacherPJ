<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class RegistrarAsistencia extends Page
{
    protected static ?string $navigationLabel = 'Registro de Asistencias';

    protected static string|null|\UnitEnum $navigationGroup = 'Seguimiento';

    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-plus';

    protected string $view = 'filament.pages.registrar-asistencia';
}
