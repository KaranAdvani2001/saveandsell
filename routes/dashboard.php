<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\TradeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'dashboard'], function() {

    Route::get('/index',[DashboardController::class, 'index'])->name('dashboard.index');


    /**
      * Category
     */
     Route::prefix('/category')->group(function (){

        Route::get('', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update',[CategoryController::class, 'update'])->name('category.update');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
     });

     
    /**
      * product
     */
    Route::prefix('/product')->name('product.')->group(function (){

      Route::get('', [ProductController::class, 'index'])->name('index');
      Route::get('/create',[ProductController::class, 'create'])->name('create');
      Route::post('/store',[ProductController::class, 'store'])->name('store');
      Route::get('edit/{id}',[ProductController::class, 'edit'])->name('edit');
      Route::post('/update',[ProductController::class, 'update'])->name('update');
      Route::get('delete/{id}',[ProductController::class, 'delete'])->name('delete');
   });

     /**
      * trade
     */

      Route::get('my-trade', [TradeController::class, 'myTrade'])->name('my.trade');
      Route::get('trade-details/{id}', [TradeController::class, 'details'])->name('trade.details');
      Route::post('my-trade-received', [TradeController::class, 'myTradeReceived'])->name('my.trade.received');
      
});
