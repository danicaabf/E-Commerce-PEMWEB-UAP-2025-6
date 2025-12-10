<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

// ================= AUTH =================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () { return view('dashboard');})
    ->name('dashboard');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Store
     Route::get('/store', [StoreController::class, 'index'])->name('store.index');
     Route::get('/store/{id}', [StoreController::class, 'show'])->name('store.show');
     
    // Checkout ───────────────
     Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout.index');
     
    // Category
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])
        ->name('categories.show');

    // Orders
    Route::get('/orders', [OrdersController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])
        ->name('orders.show');});

       // ================= ROLE =================

        // ADMIN ONLY
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/admin/dashboard', function () {
                return view('admin.dashboard');
            })->name('admin.dashboard');
        });

        // SELLER ONLY
        Route::middleware(['auth', 'role:seller'])->group(function () {
            Route::get('/seller/dashboard', function () {
                return view('seller.dashboard');
            })->name('seller.dashboard');
        });

        // MEMBER ONLY
        Route::middleware(['auth', 'role:member'])->group(function () {
            Route::get('/member/dashboard', function () {
                return view('member.dashboard');
            })->name('member.dashboard');
        });

require __DIR__.'/auth.php';