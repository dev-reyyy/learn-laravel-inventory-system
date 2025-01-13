<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'cost_price',
        'unit_price',
        'quantity',
        'unit',
        'reorder_level',
        'description',
        'featured_image',
        'additional_images',
        'status',
    ];

    const UNITS = [
        'pieces',
        'kg',
        'grams',
        'liters',
        'milliliters',
        'packs',
        'boxes',
        'dozen',
    ];
}
