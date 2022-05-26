<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends = ['image_url','level_name','icon_url'];
    protected $with = ['image', 'children'];
    protected $fillable = [
        'parent_id', 'name', 'slug', 'sort_order', 'short_description', 'description', 'is_featured', 'level', 'show_in_menu',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function image(){
        return $this->morphOne(File::class,'fileable');
    }
    public function icon(){
        return $this->hasOne(File::class,'fileable_id','id')->where('table_name','categories_icon');
    }
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function service()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function getImageUrlAttribute(){
        if($this->image){
            return $this->image->full_url;
        }else{
            return config('app.noimage');
        }
    }
    public function getIconUrlAttribute(){
        if($this->icon){
            return $this->icon->full_url;
        }else{
            return config('app.noimage');
        }
    }
    public function getLevelNameAttribute(){
        $name = '';
        for($i = 0; $i < $this->level; $i++){
            $name.='-';
        }
        $name.=$this->name;
        return $name;
    }
}
