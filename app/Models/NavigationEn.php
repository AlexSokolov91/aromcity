<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationEn extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function navigation()
    {
        return $this->hasOne(Navigation::class);
    }
}
