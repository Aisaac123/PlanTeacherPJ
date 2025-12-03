<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to(\Filament\Pages\Dashboard::getUrl());
})->name('home');

Route::get('/app/logout', function () {
    auth()->logout();

    return redirect()->to('/');
});
