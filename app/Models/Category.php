<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
        [
            'name', 'id',
        ];
    public function products()
    {
        return $this->hasOne(Product::class);
    }
    public function products_en()
    {
        return $this->hasOne(ProductEn::class);
    }
    public function brand()
    {
        return $this->hasOne(Brand::class);
    }
}
