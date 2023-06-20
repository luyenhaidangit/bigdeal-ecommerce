<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'order',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
