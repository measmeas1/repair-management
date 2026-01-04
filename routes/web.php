<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLogin']);
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/services', ServiceController::class);
    });

    // Accessible by both admin and staff
    Route::resource('/customers', CustomerController::class);
    Route::resource('/vehicles', VehicleController::class);
    Route::resource('/profile', ProfileController::class);
    
    Route::resource('/repairs', RepairController::class);
    Route::patch('/repairs/{repair}/status', [RepairController::class, 'updateStatus'])
    ->name('repairs.updateStatus');
    Route::get('/repairs/{repair}', [RepairController::class, 'show'])
    ->name('repairs.show');



});
