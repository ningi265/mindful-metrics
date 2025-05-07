<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
use App\Http\Controllers\DashboardController;
Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Original profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // New user profile routes
    Route::get('/user-profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::put('/user-profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::put('/user-profile/password', [UserProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/user-profile/avatar', [UserProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    
    // Reports routes
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/sales', [ReportsController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/inventory', [ReportsController::class, 'inventory'])->name('reports.inventory');
    Route::get('/reports/customers', [ReportsController::class, 'customers'])->name('reports.customers');
});

require __DIR__.'/auth.php';