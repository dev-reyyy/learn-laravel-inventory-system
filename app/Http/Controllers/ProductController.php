<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

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
        //
    }

    public function show($productId)
    {
        $product = Product::find($productId);

        return view('product.show', compact('product'));
    }

    public function edit($productId)
    {
        $product = Product::find($productId);
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $units = Product::UNITS;

        return view('product.create', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, $productId)
    {
        //
    }

    public function destroy($productId)
    {
        //
    }
}
