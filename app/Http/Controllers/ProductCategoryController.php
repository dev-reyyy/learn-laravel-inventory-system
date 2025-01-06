<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index() {
        return view('product-category.index');
    }
    
    public function create() {
        return view('product-category.create');
    }
    
    public function store(Request $request) {
        return redirect()->back();
    }
}
