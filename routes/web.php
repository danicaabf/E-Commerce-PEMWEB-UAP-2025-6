<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
 
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VerifyStoreController;
use App\Http\Controllers\Admin\UserStoreController;

use App\Http\Controllers\SellerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TopupController;


// ================= HOME PUBLIC =================
Route::get('/', function () {
    return view('welcome');
});


// ================= AUTH =================
Route::middleware(['auth'])->group(function () {

    // DASHBOARD UNTUK MEMBER
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // STORE
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
    Route::get('/store/{store:slug}', [StoreController::class, 'show'])->name('store.show');

    //PRODUCT DETAIL
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

    // CHECKOUT
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout.index');

    // CATEGORY
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

    // ORDERS
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
});


// ================= ADMIN ONLY =================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // HOME ADMIN
        Route::get('/home', [AdminController::class, 'index'])->name('home');

        // VERIFIKASI TOKO
        Route::get('/verification', [VerifyStoreController::class, 'index'])->name('verify.index');
        Route::post('/verification/{store}/approve', [VerifyStoreController::class, 'approve'])->name('verify.approve');
        Route::post('/verification/{store}/reject', [VerifyStoreController::class, 'reject'])->name('verify.reject');

        // USER & STORE MANAGEMENT
        Route::get('/users', [UserStoreController::class, 'index'])->name('users.index');
    });


// ================= SELLER ONLY =================
Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/seller/dashboard', function () {
        return view('seller.dashboard');
    })->name('seller.dashboard');
});


// ================= MEMBER ONLY =================
Route::middleware(['auth', 'role:member'])->group(function () {

    // DASHBOARD MEMBER
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');

    // TRANSAKSI MEMBER
    Route::get('/member/transactions', [TransactionController::class, 'index'])
        ->name('member.transactions');

    // WALLET
    Route::get('/member/wallet', [TopupController::class, 'wallet'])
        ->name('wallet.index');

    // TOPUP (GET)
    Route::get('/member/topup', [TopupController::class, 'index'])
        ->name('topup.index');

    // TOPUP (POST)
    Route::post('/member/topup', [TopupController::class, 'store'])
        ->name('topup.store');
});

    // PROSES CHECKOUT
    Route::post('/checkout/{id}/process', [CheckoutController::class, 'process'])
        ->middleware('auth')
        ->name('checkout.process');


require __DIR__.'/auth.php';
