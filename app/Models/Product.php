<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\Brand;
use App\Models\ProductOption;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'discount_price',
        'start_date_discount',
        'expiration_date_discount',
        'image',
        'short_description',
        'full_description',
        'specification',
        'video_ytb',
        'view_count',
    ];

    protected $casts = [
        'start_date_discount' => 'datetime',
        'expiration_date_discount' => 'datetime',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function getRatingStarAttribute()
    {
        if ($this->productReviews->count() > 0) {
            return $this->productReviews->avg('rating');
        }

        return 0;
    }
}