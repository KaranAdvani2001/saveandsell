<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->simplePaginate(5);
        return view('dashboard.category.index',['categories' => $categories, 'menu' => 'category']);
    }

    public function create()
    {
        return view('dashboard.category.create',['menu' => 'category']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $save = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success', "Category successfully added");
    }


    public function edit($id)
    {
        try {
            $category = Category::where(['id' => decrypt($id)])->first();
            if(!empty($category)) {
                return view('dashboard.category.edit',['category' => $category, 'menu' => 'category']);
            } 
            return redirect()->route('category.index')->with('dismiss', 'Category does not found');

        } catch(Exception $e) {
            return redirect()->route('category.index')->with('dismiss', 'Category does not found');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'. $request->edit_id,
        ]);

        $category = Category::where(['id' => $request->edit_id])->first();
        if(!empty($category)) {
            $category->update([
                'name' => $request->name
            ]);

            return redirect()->route('category.index')->with('success', "Category successfully updated");
        }
        return redirect()->route('category.index')->with('dismiss', "Category doesn't exixt");
    }

    
    public function delete($id)
    {
        try {
            $category = Category::where(['id' => decrypt($id)])->first();
            if(!empty($category)) {
                $category->delete();
                return redirect()->route('category.index')->with('success', 'Category successfully deleted');

            } 
            return redirect()->route('category.index')->with('dismiss', 'Category does not found');

        } catch(Exception $e) {
            return redirect()->route('category.index')->with('dismiss', 'Category does not found');
        }
    }
}
