<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::resource('/staffs', UserController::class );
Route::resource('/customers', CustomerController::class);
Route::resource('/vehicles', VehicleController::class);
Route::view('/services', 'pages.services')->name('services');
Route::view('/repair', 'pages.repair')->name('repair');
Route::resource('/profile', ProfileController::class);


// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', DashboardController::class)->name('dashboard');

//     Route::resource('customers', CustomerController::class);
//     Route::resource('vehicles', VehicleController::class);
//     Route::resource('repairs', RepairController::class);

//     Route::middleware('admin')->group(function () {
//         Route::resource('users', UserController::class);
//         Route::resource('services', ServiceController::class);
//     });
// });
