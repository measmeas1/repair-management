<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::view('/staff', 'dashboard.staff')->name('staff');
Route::view('/customers', 'dashboard.customers')->name('customers');
