<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = [
        'product_id',
        'color',
        'size',
        'ram',
        'rom',
        'ram_rom',
        'cpu',
        'sweep_frequency',
        'hard_drive',
        'resolution',
        'price',
        'discount_price',
        'start_date_discount',
        'expiration_date_discount',
        'specification',
    ];

    protected $casts = [
        'start_date_discount' => 'datetime',
        'expiration_date_discount' => 'datetime',
    ];
}
