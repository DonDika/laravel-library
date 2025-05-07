<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routing untuk manajemen buku (hanya untuk admin dan librarian)
Route::middleware(['role:admin|librarian'])->group(function () {
    Route::resource('books', BookController::class);
});



// Routing untuk peminjaman buku (hanya untuk member)
Route::middleware(['role:member'])->group(function () {
    Route::get('loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('loans/{book}/borrow', [LoanController::class, 'borrow'])->name('loans.borrow');
});



// Routing untuk pengembalian buku (hanya untuk admin dan librarian)
Route::middleware(['role:admin|librarian'])->group(function () {
    Route::get('returns', [ReturnController::class, 'index'])->name('returns.index');
    Route::post('returns/{loan}/return', [ReturnController::class, 'returnBook'])->name('returns.return');
});




require __DIR__.'/auth.php';
