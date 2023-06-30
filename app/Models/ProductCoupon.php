<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;

class ProductCoupon extends Model
{
    protected $table = 'product_coupons';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
