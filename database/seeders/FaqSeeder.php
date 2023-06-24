<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
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
                'question' => 'Làm thế nào để đặt hàng sản phẩm trên trang web?',
                'answer' => 'Để đặt hàng sản phẩm, bạn có thể thực hiện các bước sau...',
                'order' => 1,
            ],
            [
                'question' => 'Chính sách đổi trả hàng như thế nào?',
                'answer' => 'Chúng tôi có một chính sách đổi trả hàng linh hoạt...',
                'order' => 2,
            ],
        ];

        Faq::insert($data);
    }
}
