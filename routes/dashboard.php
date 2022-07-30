<?php

use App\Http\Controllers\Dashboard\BuyController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfilreController;
use App\Http\Controllers\Dashboard\TradeController;
use App\Http\Controllers\Dashboard\UserController;
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
    
 
    Route::get('trading', [TradeController::class, 'trading'])->name('trading.list');
    Route::get('trading-details/{id}', [TradeController::class, 'tradingDetails'])->name('trading.details');
    Route::post('trading-status-update', [TradeController::class, 'tradingStatusUpdate'])->name('trading.status.update');
  
    /**
      * buy/order
     */

    Route::get('my-order', [BuyController::class, 'myOrder'])->name('my.order');
    Route::get('my-order-details/{id}', [BuyController::class, 'myOrderDetails'])->name('my.order.details');
    Route::post('my-order-received', [BuyController::class, 'myOrderReceived'])->name('my.order.received');
  

    Route::get('orders', [BuyController::class, 'orders'])->name('orders.list');
    Route::get('order-details/{id}', [BuyController::class, 'ordersDetails'])->name('trading.details');
    Route::post('orders-status-update', [BuyController::class, 'orderStatusUpdate'])->name('order.status.update');


    /**
     * profile
     */
    
     Route::get('profile',[ProfilreController::class,'profile'])->name('profile');
     Route::post('profile-update',[ProfilreController::class,'profileUpdate'])->name('profile.update');
    
     Route::get('password',[ProfilreController::class,'password'])->name('password');
     Route::post('password-update',[ProfilreController::class,'passwordUpdate'])->name('password.update');
    
     /**
      * buyer/seller list
      */
     Route::get('user-list',[UserController::class,'index'])->name('user.list');
     Route::get('make-admin/{id}',[UserController::class,'makeAdmin'])->name('make.admin');
     Route::get('remove-admin/{id}',[UserController::class,'removedAdmin'])->name('remove.admin');


});
