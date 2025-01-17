<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyHelper;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $units = Product::UNITS;

        return view('product.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'sku'           => 'required|string|max:100|unique:products,sku',
            'category_id'   => 'required|integer|exists:product_categories,id',
            'cost_price'    => 'nullable|numeric|min:0',
            'unit_price'    => 'nullable|numeric|min:0',
            'quantity'      => 'nullable|integer|min:0',
            'unit'          => 'required|string|in:' . implode(',', Product::UNITS),
            'reorder_level' => 'nullable|integer|min:0',
            'description'   => 'nullable|string|max:1000',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'        => 'required|string|in:active,inactive',
        ]);

        $featuredImagePath      = FileHelper::storeFile($request->file('featured_image'), 'product-images', 'public');
        $additionalImagePaths   = FileHelper::storeFiles($request->file('additional_images'), 'product-images', 'public');
                
        $validated = array_merge($validated, [
            'cost_price'    => $validated['cost_price'] ?? 0,
            'unit_price'    => $validated['unit_price'] ?? 0,
            'quantity'      => $validated['quantity'] ?? 0,
            'reorder_level' => $validated['reorder_level'] ?? 0,
            'featured_image' => $featuredImagePath,
            'additional_images' => json_encode($additionalImagePaths),
        ]);
        
        $product = Product::create($validated);

        return redirect()->back()->with('success', 'Product successfully created.');
    }

    public function show($productId)
    {
        $product = Product::find($productId);
        $product->cost_price = CurrencyHelper::format($product->cost_price);
        $product->unit_price = CurrencyHelper::format($product->unit_price);

        return view('product.show', compact('product'));
    }

    public function edit($productId)
    {
        $product = Product::find($productId);
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $units = Product::UNITS;

        return view('product.edit', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, $productId)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'sku'           => 'required|string|max:100|unique:products,sku,' . $productId,
            'category_id'   => 'required|integer|exists:product_categories,id',
            'cost_price'    => 'nullable|numeric|min:0',
            'unit_price'    => 'nullable|numeric|min:0',
            'quantity'      => 'nullable|integer|min:0',
            'unit'          => 'required|string|in:' . implode(',', Product::UNITS),
            'reorder_level' => 'nullable|integer|min:0',
            'description'   => 'nullable|string|max:1000',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status'        => 'required|string|in:active,inactive',
        ]);

        $product = Product::find($productId);

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            FileHelper::deleteFile($product->featured_image, 'public');
            $featuredImagePath = FileHelper::storeFile($request->file('featured_image'), 'product-images', 'public');
        } else {
            $featuredImagePath = $product->featured_image;
        }

        // Handle additional images
        $additionalImagePaths = $product->additional_images ? json_decode($product->additional_images, true) : [];
        if ($request->hasFile('additional_images')) {
            FileHelper::deleteFiles($additionalImagePaths, 'public');
            $additionalImagePaths = FileHelper::storeFiles($request->file('additional_images'), 'product-images', 'public');
        }
                
        $product->update(array_merge($validated, [
            'featured_image' => $featuredImagePath,
            'additional_images' => json_encode($additionalImagePaths),
        ]));

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function destroy($productId)
    {
        $product = Product::find($productId);
        
        $additionalImagePaths = $product->additional_images ? json_decode($product->additional_images, true) : [];
        FileHelper::deleteFile($product->featured_image, 'public');
        FileHelper::deleteFiles($additionalImagePaths, 'public');

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
