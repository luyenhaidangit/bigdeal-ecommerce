<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'review_title',
        'rating',
        'comment',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
