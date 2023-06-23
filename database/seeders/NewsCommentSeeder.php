<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsComment;

class NewsCommentSeeder extends Seeder
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
                'news_id' => 1,
                'name' => 'Luyện Hải Đăng',
                'email' => 'luyenhaidangit@gmail.com',
                'content' => 'Bài viết hay!',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'news_id' => 1,
                'name' => 'Đào Xuân Đức',
                'email' => 'daoxuanduc@gmail.com',
                'content' => 'Đỉnh của tóp',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        NewsComment::insert($data);
    }
}
