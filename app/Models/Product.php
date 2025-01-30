<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'product_name',
        'title',
        'product_description',
        'product_active',
        'product_stock',
        'product_price',
        'product_sale_price',
        'product_color',
        'product_image'
    ];
}
