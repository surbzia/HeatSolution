<?php

namespace App\Models;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $with = ['products'];
    protected $fillable = [
        'product_id',
        'cart_id',
        'quantity',
        'rowtotal',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
