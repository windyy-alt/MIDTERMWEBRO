<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
