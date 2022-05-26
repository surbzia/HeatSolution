<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $appends = ['image_url','category_name'];
    protected $with = ['image','categories'];
    protected $fillable = [
        'category_id', 'name', 'slug','short_description', 'description', 'is_featured', 'level', 'show_in_menu',
    ];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function image(){
        return $this->morphOne(File::class,'fileable');
    }
 
    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(){
        if($this->image){
            return $this->image->full_url;
        }else{
            return config('app.noimage');
        }
    }
    public function getCategoryNameAttribute(){
        if($this->category != null){
            return $this->category->name;
        }else{
            return null;
        }
    }
}
