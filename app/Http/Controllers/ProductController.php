<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
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


    public function guestShow($slug,Request $request)
    {
        $product = Product::with('productImages')
            ->with('productOptions')
            ->with('productReviews')
            ->where('slug', $slug)
            ->firstOrFail();

        $price = $product->price;
        $priceDiscount = $product->discount_price;
        $timeRemaining = null;

        $code = $request->input('code');

        if ($product->productOptions->isNotEmpty()) {
            if($code){
                $productOption = $product->productOptions->firstWhere('id', $code);
            }else{
                $productOption = $product->productOptions->first();
            }

            $now = Carbon::now();
            $startDiscount = $productOption->start_date_discount;
            $expirationDiscount = $productOption->expiration_date_discount;
            $priceDiscount = $productOption->discount_price;
            $price = $productOption->price;

            if ($startDiscount <= $now && $now <= $expirationDiscount) {
                $priceDiscount = $productOption->discount_price;
                $remainingDuration = $now->diff($expirationDiscount);
                $timeRemaining = $remainingDuration->format('%d ngày %H tiếng');
            }else{
                $priceDiscount = null;
            }
        }

        $discountPercentage = round((($price - $priceDiscount) / $price) * 100);

        return view('guest.product.show', compact('product', 'price', 'priceDiscount', 'discountPercentage', 'timeRemaining','productOption'));
    }


}