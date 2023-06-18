<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'discount_code',
        'image',
        'description',
        'discount_type',
        'discount_value',
        'minimum_order_total',
        'maximum_discount_amount',
        'apply_all',
        'start_date',
        'expiration_date',
        'usage_limit'
    ];

    protected $dates = [
        'start_date',
        'expiration_date'
    ];
}
