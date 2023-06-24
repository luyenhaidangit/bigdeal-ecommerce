<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Brand;
use App\Models\ProductOption;
use Illuminate\Support\Arr;

class ProductCategoryController extends Controller
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
    public function guestShow($slug, Request $request)
    {
        $category = ProductCategory::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$category) {
            abort(404);
        }

        $selectedColors = $request->input('color', []);

        $selectedBrands = $request->input('brand', []);

        if (!empty($selectedBrands)) {
            $selectedBrands = explode(',', $selectedBrands);
        }

        if (!empty($selectedColors)) {
            $selectedColors = explode(',', $selectedColors);
        }

        $perPage = $request->input('perPage', 1);
        $sort = $request->input('sort', 'default');

        $productsQuery = $category->products();

        if (!empty($selectedBrands)) {
            $productsQuery->whereIn('brand_id', $selectedBrands);
        }

        if (!empty($selectedColors)) {
            if (is_array($selectedColors) && count($selectedColors) > 0) {
                $productsQuery->whereHas('productOptions', function ($query) use ($selectedColors) {
                    $query->whereIn('color', $selectedColors);
                });
            }
        }
        
        if ($sort === 'low_to_high') {
            $productsQuery->orderBy('price', 'asc');
        } elseif ($sort === 'high_to_low') {
            $productsQuery->orderBy('price', 'desc');
        }

        $newProducts = $category->products()->get();

        $products = $productsQuery->paginate($perPage);

        $brands = Brand::whereIn('id', $category->products()->pluck('brand_id')->unique())->get();

        $productIds = $category->products->pluck('id')->toArray();
        $options = [];
        $options['colors'] = ProductOption::whereIn('product_id', $productIds)->distinct('color')->take(5)->pluck('color');
        $options['sizes'] = ProductOption::whereIn('product_id', $productIds)->distinct('size')->take(5)->pluck('size');
        $options['rams'] = ProductOption::whereIn('product_id', $productIds)->distinct('ram')->take(5)->pluck('ram');
        $options['roms'] = ProductOption::whereIn('product_id', $productIds)->distinct('rom')->take(5)->pluck('rom');
        $options['ram_roms'] = ProductOption::whereIn('product_id', $productIds)->distinct('ram_rom')->take(5)->pluck('ram_rom');
        $options['cpus'] = ProductOption::whereIn('product_id', $productIds)->distinct('cpu')->take(5)->pluck('cpu');
        $options['sweep_frequencys'] = ProductOption::whereIn('product_id', $productIds)->distinct('sweep_frequency')->take(5)->pluck('sweep_frequency');
        $options['hard_drives'] = ProductOption::whereIn('product_id', $productIds)->distinct('hard_drive')->take(5)->pluck('hard_drive');
        $options['resolutions'] = ProductOption::whereIn('product_id', $productIds)->distinct('resolution')->take(5)->pluck('resolution');

        return view('guest.product_category.show', compact('category', 'products', 'perPage', 'sort', 'brands', 'options', 'newProducts', 'selectedBrands','selectedColors'));
    }
}