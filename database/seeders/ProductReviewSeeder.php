<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductReview;

class ProductReviewSeeder extends Seeder
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
                'name' => 'Nguyen Van A', 
                'email' => 'nguyenvana@example.com', 
                'review_title' => 'Đánh giá sản phẩm Xiaomi Redmi 12',
                'rating' => 4, 
                'comment' => 'Sản phẩm rất tốt, giá cả hợp lý.', 
            ],
            [
                'product_id' => 1,
                'name' => 'Nguyen Thi B',
                'email' => 'nguyenthib@example.com',
                'review_title' => 'Đánh giá sản phẩm Xiaomi Redmi 12',
                'rating' => 5,
                'comment' => 'Mình rất hài lòng với sản phẩm này.',
            ],
        ];

        ProductReview::insert($data);
    }
}
