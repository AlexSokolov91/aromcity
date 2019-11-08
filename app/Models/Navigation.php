<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_en()
    {
        return $this->hasMany(ProductEn::class);
    }
    public function navigationEn()
    {
        return $this->belongsTo(NavigationEn::class);
    }
}
