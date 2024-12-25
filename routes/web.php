<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// Halaman Landing Page
Route::get('/', function () {
    return view('landing'); // View untuk halaman utama
})->name('landing');

// Halaman Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Redirect berdasarkan role setelah login
Route::middleware(['auth'])->get('/dashboard', function () {
    // Mengecek role pengguna dan mengarahkan ke halaman yang sesuai
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('products.index');
    }
})->name('dashboard');

// Halaman Produk (untuk pengguna biasa)
Route::resource('products', ProductController::class)->middleware('auth');

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // Route khusus untuk halaman index admin
        Route::get('/products', [ProductController::class, 'indexAdmin'])->name('products.index');
        
        // Routes CRUD lainnya untuk admin
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

// Route Checkout setelah produk dibuat
Route::get('/checkout/{productId}', [CheckoutController::class, 'show'])->name('checkout.show');

// Proses Checkout (menyimpan atau memproses transaksi)
Route::post('/checkout/{productId}', [CheckoutController::class, 'submit'])->name('checkout.submit');
