<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainSlider;

class MainSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainSlider::create([
            'image' => '/images/banner/1.jpg',
            'title_1' => 'Điện thoại Xiaomi',
            'title_2' => 'Ram lớn, Pin trâu',
            'title_3' => 'Xiaomi series',
            'child_image_1' => '/images/banner/7.jpg',
            'child_image_2' => '/images/banner/7.jpg',
            'link_url' => '#',
            'order' => 0,
        ]);

        MainSlider::factory()->count(1)->create();
    }
}
