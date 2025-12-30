<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
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

Route::resource('/staffs', StaffController::class );
Route::resource('/customers', CustomerController::class);
Route::view('/vehicles', 'pages.vehicles')->name('vehicles');
Route::view('/services', 'pages.services')->name('services');
Route::view('/repair', 'pages.repair')->name('repair');
Route::resource('/profile', ProfileController::class);
