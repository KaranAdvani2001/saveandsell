<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'dashboard'], function() {

    Route::get('/home',[DashboardController::class, 'index'])->name('dashboard.index');


    /**
      * Category
     */
     Route::prefix('/category')->group(function (){
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update',[CategoryController::class, 'update'])->name('category.update');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
     });
});


// Route::prefix('/dashboard')->name('dashboard.')->group(function (){
//     
// });
