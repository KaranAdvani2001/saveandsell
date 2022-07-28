<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where(['user_id' => Auth::id()])->get();
        return view('frontend.cart.index',['carts' => $carts]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'quantity'      => 'required|numeric',
        ]);


        $user_id = Auth::id();
        if(empty($user_id)) {
            return redirect()->back()->with('dismiss', "At first you have to login");
        }

        try {

            $product = Cart::where(['product_id' => $request->product_id, 'user_id' => $user_id])->first();
            if(!empty($product)) {
                $product->update([
                        'quantity'  => $product->quantity + 1
                ]);
            } else {
                Cart::create([
                    'user_id'       => $user_id,
                    'product_id'    => $request->product_id,
                    'quantity'      => $request->quantity
                ]);
            }
            return redirect()->route('cart.list')->with('success', "Product successfully added to the cart");

        } catch(Exception $e) {
            return redirect()->back()->with('dismiss', $e->getMessage());
        }
    }
}
