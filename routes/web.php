<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index', ['products' => Product::all()]);
});
