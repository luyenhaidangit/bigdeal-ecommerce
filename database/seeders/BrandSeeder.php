<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
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
                'name' => 'iPhone',
                'slug' => 'iphone',
                'image' => '/images/brand/1.png',
                'banner' => '/images/brand/2.png',
                'description' => '<p><strong>Iphone</strong></p><p>Iphone là một hãng thiết bị di động được sử dụng để liên lạc và truy cập vào các dịch vụ di động. Với công nghệ ngày càng phát triển, điện thoại không chỉ là một phương tiện liên lạc mà còn có nhiều tính năng và ứng dụng khác nhau.</p>',
                'order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'image' => '/images/brand/3.png',
                'banner' => '/images/brand/4.png',
                'description' => '<p><strong>Samsung</strong></p><p>Samsung là một hãng thiết bị di động được sử dụng để liên lạc và truy cập vào các dịch vụ di động. Với công nghệ ngày càng phát triển, điện thoại không chỉ là một phương tiện liên lạc mà còn có nhiều tính năng và ứng dụng khác nhau.</p>',
                'order' => 0,
                'is_active' => true,
            ],
        ];

        Brand::insert($data);
    }
}
