<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.admin');
});
Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
Route::resource('product-category', ProductCategoryController::class);
Route::resource('warehouse', WarehouseController::class);