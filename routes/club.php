<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('club')->group(function () {

    // Globally accessible route
    Route::get('/infos', function () {
        return Inertia::render('club/Infos');
    })->name('club.infos');

    // Only accessible to guests
    Route::middleware('guest')->group(function () {
        // Redirect to the club infos page if the user is a guest
        Route::get('/', function () {
            return redirect()->route('club.infos');
        });
    });

    // Only accessible to authenticated users
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return Inertia::render('club/Home');
        })->name('club.home');

        Route::prefix('admin')->group(function () {
            Route::get('/users', [AdminController::class, 'users'])->middleware(Admin::class)->name('club.admin.users');
        });
    });

    // Include other route files
    require __DIR__ . '/auth.php';
    require __DIR__ . '/settings.php';
});
