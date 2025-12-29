<?php

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

Route::view('/staff', 'pages.staff')->name('staff');
Route::view('/customers', view: 'pages.customers')->name('customers');
Route::view('/vehicles', 'pages.vehicles')->name('vehicles');
Route::view('/services', 'pages.services')->name('services');

