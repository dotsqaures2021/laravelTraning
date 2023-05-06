<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'color',
        'product_code',
        'brand_id',
        'gender',
        'function',
        'stock',
        'description',
        'image',
        'is_active',
    ];
}
