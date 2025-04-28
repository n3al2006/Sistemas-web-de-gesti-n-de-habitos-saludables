<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HabitController as AdminHabitController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\HabitController as UserHabitController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('admin-panel')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/habits', AdminHabitController::class);
        Route::get('/users/progress', [AdminUserController::class, 'progress'])->name('users.progress');
    });
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        
        // Habits routes
        Route::get('/habits', [UserHabitController::class, 'index'])->name('habits.index');
        Route::get('/habits/create', [UserHabitController::class, 'create'])->name('habits.create');
        Route::post('/habits', [UserHabitController::class, 'store'])->name('habits.store');
        Route::get('/habits/recommended', [UserHabitController::class, 'recommended'])->name('habits.recommended');
        Route::post('/habits/adopt/{habit}', [UserHabitController::class, 'adopt'])->name('habits.adopt');
        Route::put('/habits/{habit}', [UserHabitController::class, 'update'])->name('habits.update');
        Route::delete('/habits/{habit}', [UserHabitController::class, 'destroy'])->name('habits.destroy');
        Route::post('/habits/{habit}/progress', [UserHabitController::class, 'updateProgress'])
            ->name('habits.progress');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
