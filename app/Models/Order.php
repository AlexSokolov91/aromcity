<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price' ,
        'client_name',
        'client_phone',
        'order_status',
        'total_price',
        'comments',
        'city',
        'warehouse'
    ];

    public function orderProducts()
    {
        return $this->hasOne(OrderProduct::class);
    }

//    public function products()
//    {
//        return $this->hasOne(Product::class);
//    }


}
