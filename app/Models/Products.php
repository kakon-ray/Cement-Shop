<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    protected $fillable = [
        'brand_title',
        'category',
        'cement_brand',
        'cement_brand_type',
        'rod_brand',
        'rod_size',
        'product_details',
        'thumbnail',
        'images',
        'price',
    ];
}
