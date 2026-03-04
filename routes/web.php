<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'))->name('home');

// Google OAuth
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Profile CRUD
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Projects
    Route::resource('projects', ProjectController::class);
    Route::patch('projects/{project}/archive', [ProjectController::class, 'archive'])->name('projects.archive');
});

/*
|--------------------------------------------------------------------------
| Role-based Routes
|--------------------------------------------------------------------------
*/

// Admin only
Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('teams', TeamController::class)->except(['show']);
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
});

// Developer or Admin
Route::middleware(['auth', CheckRole::class . ':developer,admin'])->group(function () {
    Route::get('/developer', [DashboardController::class, 'developer'])->name('dashboard.developer');
});

// Viewer, Developer, or Admin
Route::middleware(['auth', CheckRole::class . ':viewer,developer,admin'])->group(function () {
    Route::get('/viewer', [DashboardController::class, 'viewer'])->name('dashboard.viewer');
});

/*
|--------------------------------------------------------------------------
| Default Dashboard Redirect
|--------------------------------------------------------------------------
|
| Redirect users after login to their role-specific dashboard
|
*/
Route::get('/dashboard', function () {
    $user = Auth::user();

    return match ($user->role) {
        'admin' => redirect()->route('dashboard.admin'),
        'developer' => redirect()->route('dashboard.developer'),
        'viewer' => redirect()->route('dashboard.viewer'),
        default => redirect()->route('dashboard.viewer'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';