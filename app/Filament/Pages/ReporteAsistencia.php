<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ReporteAsistencia extends Page
{
    protected static ?string $navigationLabel = 'Reporte de Asistencias';
    protected static string|null|\UnitEnum $navigationGroup = 'Seguimiento';
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-numbered-list';

    protected string $view = 'filament.pages.reporte-asistencia';
}
