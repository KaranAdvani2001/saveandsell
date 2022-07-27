<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index', ['products' => Product::all()]);
});

Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login-check', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
