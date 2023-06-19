<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Helpers\Constants;

class BannerSeeder extends Seeder
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
                'image' => '/images/banner/1.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_MAIN_HOME,
            ],
            [
                'image' => '/images/banner/2.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_MAIN_HOME,
            ],
            [
                'image' => '/images/banner/3.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_MAIN_HOME,
            ],
            [
                'image' => '/images/banner/4.jpg',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_SPECIAL_HOME,
            ],
            [
                'image' => '/images/banner/5.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_PRODUCT_HOME,
            ],
            [
                'image' => '/images/banner/6.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_PRODUCT_HOME,
            ],
            [
                'image' => '/images/banner/7.webp',
                'title_1' => null,
                'title_2' => null,
                'title_3' => null,
                'link_url' => '#',
                'order' => 0,
                'type' => Constants::BANNER_TYPE_PRODUCT_HOME,
            ],
        ];

        Banner::insert($data);
    }
}
