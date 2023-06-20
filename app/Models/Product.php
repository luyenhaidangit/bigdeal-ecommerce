<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
