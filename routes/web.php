<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Laravel is running',
        'php_version' => PHP_VERSION,
        'env' => config('app.env')
    ]);
})->name('home');

Route::get('/app/logout', function () {
    auth()->logout();

    return redirect()->to('/');
});

Route::get('/healthz', function () {
    try {
        // Verificar conexión a base de datos
        \DB::connection()->getPdo();
        return response()->json(['status' => 'ok', 'database' => 'connected'], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
});
