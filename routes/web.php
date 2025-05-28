<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CartController;

// Página inicial
Route::get('/', function () {
    return redirect()->route('products.index');
});


// Order routes
Route::resource('orders', OrderController::class);

// Product routes
Route::resource('products', ProductController::class);

// Coupon routes
Route::resource('coupons', CouponController::class);

// Inventory routes
Route::resource('inventories', InventoryController::class);
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

// Cart routes
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');