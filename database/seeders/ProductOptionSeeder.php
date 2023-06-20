<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductOption;

class ProductOptionSeeder extends Seeder
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
                'color' => 'Đen',
                'size' => null,
                'ram' => null,
                'rom' => null,
                'ram_rom' => '6GB - 128GB',
                'cpu' => null,
                'sweep_frequency' => null,
                'hard_drive' => null,
                'resolution' => null,
                'price' => 33000000,
                'discount_price' => 29990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'specification' => 'Thông số kỹ thuật cho tùy chọn Xiaomi Redmi 12',
            ],
            [
                'product_id' => 1,
                'color' => 'Đỏ',
                'size' => null,
                'ram' => null,
                'rom' => null,
                'ram_rom' => '6GB - 128GB',
                'cpu' => null,
                'sweep_frequency' => null,
                'hard_drive' => null,
                'resolution' => null,
                'price' => 33000000,
                'discount_price' => 29990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'specification' => 'Thông số kỹ thuật cho tùy chọn Xiaomi Redmi 12',
            ],
            [
                'product_id' => 1,
                'color' => 'Đen',
                'size' => null,
                'ram' => null,
                'rom' => null,
                'ram_rom' => '6GB - 256GB',
                'cpu' => null,
                'sweep_frequency' => null,
                'hard_drive' => null,
                'resolution' => null,
                'price' => 35000000,
                'discount_price' => 31990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'specification' => 'Thông số kỹ thuật cho tùy chọn Xiaomi Redmi 12',
            ],
            [
                'product_id' => 1,
                'color' => 'Đỏ',
                'size' => null,
                'ram' => null,
                'rom' => null,
                'ram_rom' => '6GB - 256GB',
                'cpu' => null,
                'sweep_frequency' => null,
                'hard_drive' => null,
                'resolution' => null,
                'price' => 35000000,
                'discount_price' => 31990000,
                'start_date_discount' => now(),
                'expiration_date_discount' => now()->addDay(),
                'specification' => 'Thông số kỹ thuật cho tùy chọn Xiaomi Redmi 12',
            ],
        ];

        ProductOption::insert($data);
    }
}
