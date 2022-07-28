<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index', ['menu' => 'home','products' => Product::orderBy('id', 'desc')->limit(4)->get()]);
    }

    public function about()
    {
        return view('frontend.about.index',['menu' => 'about']);
    }

    public function shop( Request $request)
    {
        $query = Product::orderBy('id','desc');

        $query->when(request('products') == 'new-arrivals', function ($q) use($request) {
            return $q->orderBy('id','desc');
        });

        $products = $query->simplePaginate(2);
        return view('frontend.index', ['products' => $products, 'menu' => 'shop']);

    }

    public function details($id)
    {
        try {
            $product = Product::where(['id' => decrypt($id)])->first();
            if(!empty($product)) {
                return view('frontend.product.show',['product' => $product, 'menu' => 'home']);
            }
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
