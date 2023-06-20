<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
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
                'name' => 'Xiaomi Redmi 12',
                'slug' => 'xiaomi-redmi-12',
                'price' => 31990000,
                'discount_price' => 29990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'image' => '/images/product/1.webp',
                'short_description' => 'Đây là mô tả ngắn Xiaomi Redmi 12',
                'full_description' => 'Đây là mô tả đầy đủ Xiaomi Redmi 12',
                'specification' => 'Đây là thông số kỹ thuật Xiaomi Redmi 12',
                'video_ytb' => 'https://youtu.be/lJPECDyMyCo',
                'view_count' => 0,
            ],
            [
                'name' => 'MacBook Air 13 inch M1 2020 7-core GPU',
                'slug' => 'macbook-air-13-m1',
                'price' => 31990000,
                'discount_price' => 29990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'image' => '/images/product/2.jpeg',
                'short_description' => 'Đây là mô tả ngắn MacBook Air 13 inch M1 2020 7-core GPU',
                'full_description' => 'Đây là mô tả đầy đủ MacBook Air 13 inch M1 2020 7-core GPU',
                'specification' => 'Đây là thông số kỹ thuật MacBook Air 13 inch M1 2020 7-core GPU',
                'video_ytb' => 'https://youtu.be/_eL5eYYZmkY',
                'view_count' => 0,
            ],
        ];

        Product::insert($data);
    }
}
