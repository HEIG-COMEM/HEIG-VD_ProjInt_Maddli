<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/simulation', function () {
    return Inertia::render('BecomeCoach');
})->name('simulation');

Route::get('/become-a-coach', function () {
    return Inertia::render('HelpStarterPack');
})->name('hsp');

Route::get('dashboard', function () {
    return redirect()->route('club.home');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/club.php';
