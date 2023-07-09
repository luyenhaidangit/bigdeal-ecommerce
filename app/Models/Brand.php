<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'banner',
        'description',
        'order',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
