<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/become-a-coach', function () {
    return Inertia::render('BecomeCoach');
})->name('become-coach');

Route::get('/simulation', function () {
    return Inertia::render('Simulation');
})->name('simulation');

Route::get('dashboard', function () {
    return Route::redirect('club.home');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/club.php';
