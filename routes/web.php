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
