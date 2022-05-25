<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSaleType extends Model
{
    use HasFactory;
    protected $fillable = [
        'single_qty_text', 'multiple_qty_text',
    ];
    protected $table = 'product_sale_type';
}
