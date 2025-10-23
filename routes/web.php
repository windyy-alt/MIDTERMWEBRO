<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Models\Book;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');


Route::resource('books', BookController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

 Route::resource('category', CategoryController::class);
 Route::resource('member', MemberController::class);

 
    Route::get('/borrow/export-csv', [BorrowController::class, 'exportCSV'])->name('borrow.exportCSV');
    Route::resource('borrow', BorrowController::class);
    Route::patch('borrows/{borrow}/return', [BorrowController::class, 'returnBook'])->name('borrows.return');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
