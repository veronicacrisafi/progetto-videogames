<?php

use App\Models\Console;
use App\Models\Developer;
use App\Models\Genre;
use App\Models\Videogame;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\VideogameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'stats' => [
            'videogames' => Videogame::count(),
            'genres' => Genre::count(),
            'consoles' => Console::count(),
            'developers' => Developer::count(),
        ],
        'featuredVideogames' => Videogame::with(['developer', 'genres'])
            ->latest()
            ->take(3)
            ->get(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])
            ->name('index');
        Route::get('/profile', [DashboardController::class, 'profile'])
            ->name('profile');
    });

Route::resource('videogames', VideogameController::class)
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
