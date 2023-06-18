<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Helpers\Constants;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::createFromFormat('d/m/Y', '18/06/2023');
        $expirationDate = Carbon::createFromFormat('d/m/Y', '18/06/2025');

        $data = [
            [
                'discount_code' => 'HEGIAM5',
                'image' => '/images/coupon/coupon-1.png',
                'description' => 'Giảm thêm 5% khi thanh toán từ 300K.',
                'discount_type' => Constants::DISCOUNT_TYPE_PERCENTAGE,
                'discount_value' => 5,
                'minimum_order_total' => 0,
                'maximum_discount_amount' => 100000,
                'apply_all' => true,
                'start_date' => now(),
                'expiration_date' => now()->addDays(30),
                'usage_limit' => 100,
            ],
            [
                'discount_code' => 'GIAM100K',
                'image' => '/images/coupon/coupon-2.png',
                'description' => 'Giảm ngay 100K khi thanh toán đơn từ 500K',
                'discount_type' => Constants::DISCOUNT_TYPE_FIXED_AMOUNT,
                'discount_value' => 100000,
                'minimum_order_total' => 500000,
                'maximum_discount_amount' => null,
                'apply_all' => true,
                'start_date' => now(),
                'expiration_date' => now()->addDays(30),
                'usage_limit' => 100,
            ]
        ];

        Coupon::insert($data);
    }
}
