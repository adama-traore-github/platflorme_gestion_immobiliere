<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])
    ->middleware(['auth']) // 'verified' désactivé en local
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('properties', \App\Http\Controllers\Property\PropertyController::class);
    Route::resource('tenants', \App\Http\Controllers\Tenant\TenantController::class);
    Route::resource('leases', \App\Http\Controllers\Lease\LeaseController::class);
});

require __DIR__.'/auth.php';
