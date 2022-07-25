<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
    /**
     * put all crud routes of products, categories here
     */
    
     Route::prefix('/category')->name('category.')->group(function (){
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/create',[CategoryController::class, 'create'])->name('create');
        Route::post('/store',[CategoryController::class, 'store'])->name('store');
        Route::get('{id}/edit',[CategoryController::class, 'edit'])->name('edit');
     });
});
