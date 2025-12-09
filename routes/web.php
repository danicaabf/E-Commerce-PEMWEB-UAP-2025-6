<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// =============== DASHBOARD PER ROLE ===============
Route::middleware(['auth', 'verified'])->group(function () {
    
    // dashboard default member
    Route::get('/dashboard', function () {
        return view('member.dashboard');
    })->name('dashboard')->middleware('role:member');

    // dashboard admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin')->name('admin.dashboard');

    // dashboard seller
    Route::get('/seller/dashboard', function () {
        return view('seller.dashboard');
    })->middleware('role:seller')->name('seller.dashboard');
});


// =============== PROFILE (global) ===============
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =============== ADMIN CONTROLLER ===============
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('profile', [AdminController::class, 'edit'])->name('admin.profile.edit');
});


// =============== SELLER CONTROLLER ===============
Route::prefix('seller')->middleware(['auth','role:seller'])->group(function () {
    Route::get('profile', [SellerController::class, 'edit'])->name('seller.profile.edit');
});


// =============== MEMBER CONTROLLER ===============
Route::prefix('member')->middleware(['auth','role:member'])->group(function () {
    Route::get('profile', [MemberController::class, 'edit'])->name('member.profile.edit');
});


require __DIR__.'/auth.php';