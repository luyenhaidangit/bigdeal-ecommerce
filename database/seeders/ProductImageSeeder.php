<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
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
                'image' => '/images/product/3.jpg',
                'order' => 0,
            ],
            [
                'product_id' => 1, 
                'image' => '/images/product/4.jpg',
                'order' => 0,
            ],
            [
                'product_id' => 1, 
                'image' => '/images/product/5.jpg',
                'order' => 0,
            ],
            [
                'product_id' => 2, 
                'image' => '/images/product/6.jpg',
                'order' => 0,
            ],
            [
                'product_id' => 2, 
                'image' => '/images/product/7.jpg',
                'order' => 0,
            ],
            [
                'product_id' => 2, 
                'image' => '/images/product/8.jpg',
                'order' => 0,
            ],
        ];

        ProductImage::insert($data);
    }
}
