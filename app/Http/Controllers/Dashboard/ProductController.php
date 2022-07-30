<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->orderBy('id')->simplePaginate(5);
        return view('dashboard.product.index',['products' => $products, 'menu' => 'product']);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('dashboard.product.create',['menu' => 'product','categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required',
            'name'          => 'required',
            'price'         => 'required|numeric',
            'quantity'      => 'required|numeric',
            'image'         => 'required|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
            'type'          => 'required'
        ]);

        try {

            $image = null;
            if(!empty($request->image)) {
                $image = $this->fileUpload($request->image, 'uploaded_files/images/');
            }
                
            $productData = [
                'seller_id'       => Auth::id(),
                'category_id'   => $request->category_id,
                'name'          => $request->name,
                'size'          => $request->size,
                'price'         => $request->price,
                'quantity'      => $request->quantity,
                'description'   => $request->description,
                'image'         => $image,
                'type'          => $request->type,
            ];

            $save = Product::create($productData);
            return redirect()->route('product.index')->with('success', "Product successfully added");

        } catch( Exception $e) {
            return redirect()->back()->with('dismiss', $e->getMessage());
        }
 }


    public function edit($id)
    {
        try {
            $categories = Category::orderBy('name')->get();
            $product = product::where(['id' => decrypt($id)])->first();

            if(!empty($product)) {
                return view('dashboard.product.edit',['product' => $product, 'categories' => $categories, 'menu' => 'product']);
            } 
            return redirect()->route('product.index')->with('dismiss', 'Product is not found');

        } catch(Exception $e) {
            return redirect()->route('product.index')->with('dismiss', 'product is not found');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff |max:4096'
        ]);

        try {

            $product = Product::where(['id' => $request->edit_id])->first();
            if(empty($product))  {
                return redirect()->back()->with('dismiss', "Product is not exists");
            }
                
            $productData = [
                'seller_id'       => Auth::id(),
                'category_id'   => $request->category_id,
                'name'          => $request->name,
                'size'          => $request->size,
                'price'         => $request->price,
                'quantity'      => $request->quantity,
                'type'          => $request->type,
                'description'   => $request->description,
            ];
            if(!empty($request->image)) {
                $productData['image'] = $this->fileUpload($request->image, 'uploaded_files/images/');
            }

            $product->update($productData);
            return redirect()->route('product.index')->with('success', "Product successfully updated");

        } catch( Exception $e) {
            return redirect()->back()->with('dismiss', $e->getMessage());
        }
    }

    
    public function delete($id)
    {
        try {
            $product = Product::where(['id' => decrypt($id)])->first();
            if(!empty($product)) {
                $product->delete();
                return redirect()->route('product.index')->with('success', 'Product successfully deleted');

            } 
            return redirect()->route('product.index')->with('dismiss', 'Product is not found');

        } catch(Exception $e) {
            return redirect()->route('product.index')->with('dismiss', 'Product is not found');
        }
    }


    // image upload
    public function fileUpload($new_file, $path)
    {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
    
        $file_name = time() . $new_file->getClientOriginalName();
        $destinationPath = public_path($path);
    
        $new_file->move($destinationPath, $file_name);
        return $path.$file_name;
    }
}
