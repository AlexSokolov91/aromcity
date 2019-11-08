<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =
        [
            'brand_name', 'user_id',
        ];
    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function product_en()
    {
        return $this->hasOne(ProductEn::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
