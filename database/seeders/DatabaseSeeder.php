<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(BannerSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(DeliveryLocationSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(MainSliderSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(ProductOptionSeeder::class);
        $this->call(ProductReviewSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
    }
}
