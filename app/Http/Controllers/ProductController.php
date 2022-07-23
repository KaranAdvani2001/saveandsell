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
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('products.index')->with('products', $products)->with('cart', $cart);
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
        public function cart()
    {
        return view('cart');
    }
        public function addToCart($id)
        {
        
            $product = Product::find($id);
            if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    


    }

    
        





