<?php

use App\Http\Controllers\AdminAPIController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubAPIController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
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
        Route::get('/', [HomeController::class, 'index'])->name('club.home');

        Route::get('/users/{id}', [UserController::class, 'show'])->name('club.user');

        Route::get('/lists', [ListController::class, 'index'])->name('club.lists');

        Route::prefix('conversations')->group(function () {
            Route::post('/new', [ConversationController::class, 'store'])->name('club.conversations.new');
            Route::get('/', [ConversationController::class, 'index'])->name('club.conversations');
            Route::get('/{id}', [ConversationController::class, 'show'])->name('club.conversations');
            Route::post('/{id}/messages', [ConversationController::class, 'storeMessage'])->name('club.conversations.message');
        });

        Route::prefix('admin')->middleware(Admin::class)->group(function () {
            Route::get('/', function () {
                return redirect()->route('club.admin.clubs');
            })->name('club.admin');
            Route::get('/users', [AdminController::class, 'users'])->name('club.admin.users');
            Route::get('/users/{id}', [AdminController::class, 'user'])->name('club.admin.user');
            Route::get('/clubs', [AdminController::class, 'clubs'])->name('club.admin.clubs');
            Route::get('/clubs/{id}', [AdminController::class, 'club'])->name('club.admin.club');
            Route::delete('/club/{clubId}/coaches/{userId}', [AdminController::class, 'deleteClubCoache'])->name('club.admin.club.coaches');

            Route::prefix('api')->group(function () {
                Route::get('/available-coaches', [AdminAPIController::class, 'availableCoaches'])->name('club.admin.api.available-coaches');
            });
        });

        Route::prefix('api')->group(function () {
            Route::get('/countries', [ClubAPIController::class, 'countries'])->name('club.api.countries');
            Route::get('/countries/{countryCode}/clubs', [ClubAPIController::class, 'clubs'])->name('club.api.clubs');
            Route::get('/find-representative', [ClubAPIController::class, 'findRepresentative'])->name('club.api.find-representative');
        });
    });

    // Include other route files
    require __DIR__ . '/auth.php';
    require __DIR__ . '/settings.php';
});
