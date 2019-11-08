<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'rating',
        'text'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function product_em()
    {
        return $this->hasMany(ProductEn::class);
    }
}
