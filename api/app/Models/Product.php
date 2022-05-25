<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['image_url', 'mobile_url'];
    protected $with = ['image', 'product_sale_type'];
    protected $fillable = [
        'name','slug','price','description','short_description',
        'is_featured', 'category_id', 'product_sale_type_id', 'in_stock'
    ];
    public function related(){
        return $this->hasMany(RelatedProduct::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->morphOne(File::class,'fileable');
    }
    public function getImageUrlAttribute(){
        if($this->image){
            return $this->image->full_url;
        }else{
            return config('app.noimage');
        }
    }
    public function getMobileUrlAttribute()
    {
        if ($this->image) {
            return $this->image->mobile_url;
        } else {
            return config('app.noimage');
        }
    }
    public function product_sale_type(){
        return $this->belongsTo(ProductSaleType::class);
    }
}
