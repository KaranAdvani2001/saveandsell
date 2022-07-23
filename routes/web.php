<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');;

Route::get('/cart', [CartController::class, 'index'])
    ->name('Cart.index');;

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');;

Route::get('/products/addproduct', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');






//Route::get('/addproduct', function ()) {
    //return view('products.create')};

//Route::get('/cart', [Cartcontroller::class, 'index'])
    //->name('cart.index');
    





//});






     

require __DIR__.'/auth.php';
