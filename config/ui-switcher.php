<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Storage Driver
    |--------------------------------------------------------------------------
    */
    'driver' => env('UI_SWITCHER_DRIVER', 'session'),

    'database_column' => 'ui_preferences',

    /*
    |--------------------------------------------------------------------------
    | Default Preferences
    |--------------------------------------------------------------------------
    | Fuente por defecto: Quicksand
    | Color por defecto: Teal 950 (#042f2e)
    */
    'defaults' => [
        'font' => 'Quicksand',
        'color' => '#042f2e', // teal 950
        'layout' => 'sidebar',
        'font_size' => 16,
        'density' => 'default',
    ],

    'icon' => 'heroicon-o-cog-6-tooth',

    /*
    |--------------------------------------------------------------------------
    | Available Fonts
    |--------------------------------------------------------------------------
    | Todas correctamente disponibles en Google Fonts.
    */
    'fonts' => [
        'Quicksand',
        'Inter',
        'Poppins',
        'Public Sans',
        'DM Sans',
        'Nunito Sans',
        'Roboto',
        'Montserrat',
        'Work Sans',
        'Outfit',
        'Rubik',
        'Source Sans Pro',
        'Plus Jakarta Sans',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Colors
    |--------------------------------------------------------------------------
    | Paleta extendida → incluye TODOS los tonos teal + primarios agradables.
    */
    'custom_colors' => [

        // 🌊 Teal (completa)
        '#f0fdfa', '#ccfbf1', '#99f6e4', '#5eead4',
        '#2dd4bf', '#14b8a6', '#0d9488', '#0f766e',
        '#115e59', '#134e4a', '#042f2e', // teal 950

        // 🔵 Blue
        '#dbeafe', '#93c5fd', '#60a5fa', '#3b82f6',
        '#2563eb', '#1d4ed8', '#1e40af',

        // 🟣 Violet
        '#ede9fe', '#c4b5fd', '#a78bfa', '#8b5cf6',
        '#7c3aed', '#6d28d9',

        // 🟢 Green
        '#dcfce7', '#86efac', '#4ade80', '#22c55e',
        '#16a34a', '#15803d',

        // 🟡 Amber
        '#fef9c3', '#fde047', '#facc15', '#eab308',

        // 🟠 Orange
        '#ffedd5', '#fdba74', '#fb923c', '#f97316',
        '#ea580c',

        // 🔴 Red
        '#fee2e2', '#fca5a5', '#ef4444', '#dc2626',
    ],

    /*
    |--------------------------------------------------------------------------
    | Available Layouts
    |--------------------------------------------------------------------------
    | Agrego variantes extra modernas.
    */
    'layouts' => [
        'sidebar',
        'sidebar-collapsed',
        'sidebar-no-topbar',
        'topbar',
        'minimal',             // limpio, sin bordes
        'compact-sidebar',     // más estrecho
        'split',               // sidebar + topbar juntos
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Size Range
    |--------------------------------------------------------------------------
    | Más rango para accesibilidad.
    */
    'font_size_range' => [
        'min' => 10,
        'max' => 24,
    ],
];
