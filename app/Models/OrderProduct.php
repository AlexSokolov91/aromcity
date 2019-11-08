<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable =
        [
            'order_id' ,
            'product_id',
            'quantity'

        ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_en()
    {
        return $this->belongsTo(ProductEn::class);
    }
}
