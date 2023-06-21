<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainSlider;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ProductCategory;
use App\Models\Product;

use App\Helpers\Constants;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainSliders = MainSlider::orderBy('order', 'desc')->get();

        $brands = Brand::where('is_active', true)->orderBy('order', 'desc')->take(10)->get();

        $bannersTypeMainHome = Banner::where('type', Constants::BANNER_TYPE_MAIN_HOME)->orderBy('order', 'desc')->take(3)->get();

        $productCategories = ProductCategory::with('products')->where('is_active', true)->orderBy('order', 'desc')->take(5)->get();

        $bannerTypeSpecial = Banner::where('type', Constants::BANNER_TYPE_SPECIAL_HOME)->orderBy('order', 'desc')->first();

        $newProducts = Product::orderBy('created_at', 'desc')->take(30)->get();

        $sellingProducts = Product::orderBy('created_at', 'desc')->take(30)->get();

        $bigDiscountProducts = Product::orderByRaw('(price - discount_price) / price desc')->take(30)->get();

        $bestViewProducts = Product::orderBy('view_count', 'desc')->take(30)->get();

        return view('guest.home.home', compact(
            'mainSliders','brands','bannersTypeMainHome','productCategories',
            'bannerTypeSpecial','newProducts','sellingProducts','bigDiscountProducts',
            'bestViewProducts'
        ));
    }
}
