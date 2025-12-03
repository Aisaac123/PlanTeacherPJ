<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ArchivosDocente extends Page
{
    protected string $view = 'filament.pages.archivos-docente';

    protected static ?string $navigationLabel = 'Archivos del Docente';

    protected static ?int $navigationSort = 3; // <-- orden en la navegación

    protected static string|null|\UnitEnum $navigationGroup = 'Gestión Académica';

    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-document-chart-bar';

    public static function shouldRegisterSpotlight(): bool
    {
        return false;
    }
}
