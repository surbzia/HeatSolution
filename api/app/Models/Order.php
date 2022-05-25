<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['created_date_formatted', 'created_date_formatted_us', 'product_items'];
    protected $fillable = [
        'billing_first_name',
        'billing_last_name',
        'billing_address',
        'billing_address_2',
        'billing_city',
        'billing_zip',
        'billing_phone',
        'billing_email',
        'billing_notes',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_address_2',
        'shipping_city',
        'shipping_zip',
        'shipping_phone',
        'shipping_notes',
        'subtotal',
        'total',
        'order_status',
        'coupon_code',
        'discount',
        'discount_amount',
        'tax_percent',
        'tax_amount',
        'user_id',
    ];
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function getCreatedDateFormattedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getProductItemsAttribute()
    {
        return $this->products;
    }
    public function getCreatedDateFormattedUsAttribute()
    {
        return date('Y-m-d h:i:s a', strtotime($this->created_at));
    }
}
