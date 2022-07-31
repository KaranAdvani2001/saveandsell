<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index', ['menu' => 'home','products' => Product::where('quantity', '>', 0)->orderBy('id', 'desc')->simplePaginate(8)]);
    }

    public function about()
    {
        return view('frontend.about.index',['menu' => 'about']);
    }

    public function shop( Request $request)
    {
        $query = Product::where('quantity', '>', 0)->orderBy('id','desc');

        // $query->when(request('products') == 'new-arrivals', function ($q) use($request) {
        //     return $q->orderBy('id','desc');
        // });

        $query->when(request('products') == 'trade', function ($q) use($request) {
            return $q->where('type', 'trade')->orderBy('id','desc');
        });

        $query->when(request('products') == 'for-sale', function ($q) use($request) {
            return $q->where('type','for sale')->orderBy('id','desc');
        });

        $products = $query->simplePaginate(8);
        return view('frontend.index', ['products' => $products, 'menu' => 'shop']);

    }

    public function details($id)
    {
        try {
            
            $tradable_products = Product::where(['seller_id' => Auth::id(),'type' => 'trade'])->where('quantity','>',0)->get();

            $product = Product::where(['id' => decrypt($id)])->first();
            if(!empty($product)) {
                return view('frontend.product.show',['product' => $product, 'menu' => 'home','tradable_products' => $tradable_products]);
            }
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
