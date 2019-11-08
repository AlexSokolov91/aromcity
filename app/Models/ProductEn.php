<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductEn extends Model
{
    protected $fillable = [
        'total_price' ,
        'client_name',
        'client_phone',
        'order_status',
        'quantity',
        'one_unit_price',
        'total_price',
        'comments',
        'city',
        'warehouse'

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
//    public function product()
//    {
//        return $this->belongsToMany(Product::class);
//    }

}
