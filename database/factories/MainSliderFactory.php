<?php

namespace Database\Factories;

use App\Models\MainSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => '/images/banner/1.jpg',
            'title_1' => $this->faker->sentence(),
            'title_2' => $this->faker->sentence(),
            'title_3' => $this->faker->sentence(),
            'child_image_1' => '/images/banner/7.jpg',
            'child_image_2' => '/images/banner/7.jpg',
            'link_url' => '#',
            'order' => 0,
        ];
    }
}
