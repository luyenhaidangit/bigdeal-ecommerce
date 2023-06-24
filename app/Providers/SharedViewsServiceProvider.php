<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductCategory;
use App\Models\Coupon;
use App\Helpers\Constants;

class SharedViewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('guest.layouts.header', function ($view) {
            $productCategoryDefaultData = ProductCategory::where('is_active', true)
                ->orderBy('order', 'desc')
                ->take(10)
                ->get();

            $productCategoryMoreData = ProductCategory::where('is_active', true)
                ->orderBy('order', 'desc')
                ->skip(10)
                ->take(5)
                ->get();

            $couponData = Coupon::where('start_date', '<', now())
                ->where('expiration_date', '>', now())
                ->where('usage_limit', '>', 0)
                ->take(5)
                ->get();

            $view->with('productCategoryDefaultData', $productCategoryDefaultData)
                ->with('productCategoryMoreData', $productCategoryMoreData)
                ->with('couponData', $couponData)
                ->with('constants', Constants::class);
        });
    
        // View::composer('guest.layouts.footer', function ($view) {
        //     $footerData = 
        //     $view->with('footerData', $footerData);
        //     ->with('data2', $data2);
        // });
    }
}
