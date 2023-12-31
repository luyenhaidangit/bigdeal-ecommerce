<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Str;

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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getColorSlugAttribute()
    {
        return Str::slug($this->color);
    }
}
