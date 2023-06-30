<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class SearchController extends Controller
{
    public function guestProduct(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = $request->input('category');

        $products = Product::query();

        if ($keyword) {
            $products->where('name', 'like', '%' . $keyword . '%');
        }

        if ($category && $category !== 'all') {
            $category = ProductCategory::where('slug', $category)->first();
    
            if ($category) {
                $products->where('product_category_id', $category->id);
            }
        }
    
        $products = $products->get();

        return view('guest.search.product', compact('products','keyword','category'));
    }
}