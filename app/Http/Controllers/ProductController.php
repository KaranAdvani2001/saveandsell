<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view ('products.index', ['products' => $products]);
}

public function show($id)
{
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
        

}

public function create()
{
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);

}

public function store(Request $request)
    {


        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'size' => 'required|max:10',
            'price' => 'required|integer',
            

        ]);
        $product = new Product;
        $product->category_id = $validatedData['category_id'];
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->size = $validatedData['size'];
        $product->price = $validatedData['price'];
        $product->save();

        session()->flash('message', 'Product was added.');
        return redirect()->route('products.index');

        return $validatedData;

        return "Passed Validation";


    }
}


