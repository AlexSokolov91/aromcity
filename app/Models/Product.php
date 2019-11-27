<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name' ,
        'brand_id',
        'volume',
        'category_id',
        'country',
        'type',
        'family',
        'volume',
        'gender',
        'article',
        'price',
        'old_price',
        'discount',
        'characteristics',
        'characteristics__description',
        'popular'

    ];

    public function images()
    {
        return $this->hasOne(ProductImage::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class , 'order_products');
    }
    public function navigation()
    {
        return $this->belongsToMany(Navigation::class);
    }
    public function navigationEn()
    {
        return $this->belongsToMany(Navigation::class);
    }

    public function productEn()
    {
        return $this->belongsTo(ProductEn::class , 'id');
    }
    public function orderProduct()
    {
        return $this->belongsToMany(OrderProduct::class);
    }
//    public function order()
//    {
//        return $this->belongsTo(Order::class);
//    }
}
