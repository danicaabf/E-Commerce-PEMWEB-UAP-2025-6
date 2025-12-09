<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ================= PROFILE CONTROLLER =================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ================= SELLER CONTROLLER =================
Route::prefix('seller')->name('seller.')->middleware(['auth', 'role:seller'])->group(function () {
    Route::get('profile', [SellerController::class, 'edit'])->name('edit');
    Route::put('profile', [SellerController::class, 'update'])->name('update');
    Route::delete('profile', [SellerController::class, 'destroy'])->name('destroy');
});

// ================= ADMIN CONTROLLER =================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('profile', [AdminController::class, 'edit'])->name('edit');
    Route::put('profile', [AdminController::class, 'update'])->name('update');
    Route::delete('profile', [AdminController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
