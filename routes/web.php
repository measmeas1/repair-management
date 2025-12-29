<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('screens.dashboard');
})->name('dashboard');

Route::view('/staff', 'screens.staff')->name('staff');
Route::view('/customers', view: 'screens.customers')->name('customers');
Route::view('/vehicles', 'screens.vehicles')->name('vehicles');

