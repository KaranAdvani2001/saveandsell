<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/product/details/{id}', [HomeController::class, 'details'])->name('product.details');



Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login-check', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


/**
 * Cart
 */

Route::post('cart-add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.list');

/**
 * Checkout
 */

Route::get('payment', [CheckoutController::class, 'paymentForm'])->name('payment.form');
Route::get('stripe-payment', [CheckoutController::class, 'index'])->name('stripe.post');


