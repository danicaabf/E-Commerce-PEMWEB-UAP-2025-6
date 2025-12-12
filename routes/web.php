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

use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\HomeController;

// ================= HOME PUBLIC =================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ================= AUTH =================
Route::middleware(['auth'])->group(function () {

    // ================= MEMBER + SELLER =================
    Route::middleware([RoleMiddleware::class.':member'])->group(function () {

        // DASHBOARD MEMBER / SELLER
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // PROFILE
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // STORE
        Route::get('/store', [StoreController::class, 'index'])->name('store.index');
        Route::get('/store/{store:slug}', [StoreController::class, 'show'])->name('store.show');

        // PRODUCT DETAIL
        Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

        // CHECKOUT
        Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/{id}/process', [CheckoutController::class, 'process'])->name('checkout.process');

        // CATEGORY
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

        // ORDERS
        Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

        // TRANSAKSI MEMBER
        Route::get('/member/transactions', [TransactionController::class, 'index'])->name('member.transactions');

        // WALLET / TOPUP
        Route::get('/member/wallet', [TopupController::class, 'wallet'])->name('wallet.index');
        Route::get('/member/topup', [TopupController::class, 'index'])->name('topup.index');
        Route::post('/member/topup', [TopupController::class, 'store'])->name('topup.store');
    });

    // ================= ADMIN ONLY =================
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/home', [AdminController::class, 'index'])->name('home');

        // VERIFIKASI TOKO
        Route::get('/stores', [VerifyStoreController::class, 'index'])->name('stores.index');
        Route::post('/stores/{store}/verify', [VerifyStoreController::class, 'verify'])->name('stores.verify');
        Route::post('/stores/{store}/reject', [VerifyStoreController::class, 'reject'])->name('stores.reject');

        // USER & STORE MANAGEMENT
        Route::get('/users', [UserStoreController::class, 'index'])->name('users.index');
    });

    // ================= SELLER ONLY =================
    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');

        // Profile
        Route::get('/profile', [SellerController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [SellerController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [SellerController::class, 'destroy'])->name('profile.destroy');

        // Balance
        Route::get('/balance', [SellerController::class, 'balance'])->name('balance.index');

        // Products
        Route::get('/products', [SellerController::class, 'products'])->name('products.index');
        Route::get('/products/create', [SellerController::class, 'createProduct'])->name('products.create');
        Route::post('/products', [SellerController::class, 'storeProduct'])->name('products.store');
        Route::get('/products/{id}/edit', [SellerController::class, 'editProduct'])->name('products.edit');
        Route::put('/products/{id}', [SellerController::class, 'updateProduct'])->name('products.update');
        Route::delete('/products/{id}', [SellerController::class, 'destroyProduct'])->name('products.destroy');

        // Categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Orders
        Route::get('/orders', [SellerController::class, 'orders'])->name('orders.index');
        Route::get('/orders/{id}', [SellerController::class, 'showOrder'])->name('orders.show');
        Route::put('/orders/{id}', [SellerController::class, 'updateOrder'])->name('orders.update');

        // Withdrawals
        Route::get('/withdrawals', [SellerController::class, 'withdrawals'])->name('withdrawals.index');
        Route::get('/withdrawals/create', [SellerController::class, 'createWithdrawal'])->name('withdrawals.create');
        Route::post('/withdrawals', [SellerController::class, 'storeWithdrawal'])->name('withdrawals.store');
    });

    Route::get('/store/my', [StoreController::class, 'myStore'])->name('store.my')->middleware('auth');
});

require __DIR__.'/auth.php';