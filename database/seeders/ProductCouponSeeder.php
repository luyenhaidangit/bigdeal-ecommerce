<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCoupon;

class ProductCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_id' => 1, 
                'coupon_id' => 1,
            ],
            [
                'product_id' => 2, 
                'coupon_id' => 1,
            ],
            [
                'product_id' => 1, 
                'coupon_id' => 2,
            ],
        ];

        ProductCoupon::insert($data);
    }
}
