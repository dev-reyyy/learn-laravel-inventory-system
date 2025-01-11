<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index() {
        $categories = ProductCategory::orderBy('created_at', 'desc')->get();

        return view('product-category.index', compact('categories'));
    }
    
    public function show($categoryId) {
        $category = ProductCategory::find($categoryId);

        return view('product-category.show', compact('category'));
    }
    
    public function create() {
        return view('product-category.create');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $category               = new ProductCategory();
        $category->name         = $validated['name'];
        $category->description  = $validated['description'];
        $category->save();

        return redirect()->back()->with('success', 'Product category created successfully.');
    }

    public function edit($categoryId) {
        $category = ProductCategory::find($categoryId);

        return view('product-category.edit', compact('category'));
    }

    public function update(Request $request, $categoryId) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);
        
        $category               = ProductCategory::find($categoryId);
        $category->name         = $validated['name'];
        $category->description  = $validated['description'];
        $category->save();

        return redirect()->back()->with('success', 'Product category updated successfully.');
    }

    public function destroy($categoryId) {        
        $category = ProductCategory::find($categoryId);
        $category->delete();

        return redirect()->back()->with('success', 'Product category deleted successfully.');
    }
}
