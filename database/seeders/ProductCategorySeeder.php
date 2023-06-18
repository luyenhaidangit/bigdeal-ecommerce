<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
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
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'image' => '/images/product-category/product-category-1.webp',
                'top_banner' => '/images/product-category/product-category-banner-1.png',
                'bottom_banner' => '/images/product-category/product-category-banner-11.webp',
                'description' => '<p><strong>Điện thoại</strong></p><p>Điện thoại là một thiết bị di động được sử dụng để liên lạc và truy cập vào các dịch vụ di động. Với công nghệ ngày càng phát triển, điện thoại không chỉ là một phương tiện liên lạc mà còn có nhiều tính năng và ứng dụng khác nhau.</p>',
                'order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop',
                'image' => '/images/product-category/product-category-2.webp',
                'top_banner' => '/images/product-category/product-category-banner-2.png',
                'bottom_banner' => '/images/product-category/product-category-banner-11.webp',
                'description' => '<p><strong>Laptop</strong></p><p>Laptop là một thiết bị di động được sử dụng để liên lạc và truy cập vào các dịch vụ di động. Với công nghệ ngày càng phát triển, điện thoại không chỉ là một phương tiện liên lạc mà còn có nhiều tính năng và ứng dụng khác nhau.</p>',
                'order' => 0,
                'is_active' => true,
            ],
        ];

        ProductCategory::insert($data);
    }
}
