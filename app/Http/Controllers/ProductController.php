<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
}

public function store()
    {
        $product = new Product;
        
        $product->category = "jeans";
        $product->name = "Calvin Klein jeans";
        $product->price = 85;
        $product->sold = 0;

 
        $product->save();
        return $product;


}

}
