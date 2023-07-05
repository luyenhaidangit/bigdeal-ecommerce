<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Coupon;
use App\Models\DeliveryLocation;
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


    public function guestShow($slug, Request $request)
    {
        $product = Product::with('productImages')
            ->with('productOptions')
            ->with('productReviews')
            ->where('slug', $slug)
            ->firstOrFail();

        // Coupon
        $currentDate = now(); // Lấy ngày hiện tại

        $coupons = Coupon::where('start_date', '<=', $currentDate)
            ->where('expiration_date', '>=', $currentDate)
            ->where('usage_limit', '>', 0)
            ->whereHas('productCoupons', function ($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->get();

        $codeDelivery = $request->input('code_delivery');
        $timeDeliveryResult = null;
        if ($codeDelivery) {
            $deliveryLocation = DeliveryLocation::where('code', $codeDelivery)->first();

            $deliveryLocation = DeliveryLocation::where('code', $codeDelivery)->first();

            if ($deliveryLocation) {
                $timeDeliveryResult = 'Địa chỉ được giao hàng trước hỗ trợ giao hàng';
            } else {
                $timeDeliveryResult = 'Địa chỉ giao hàng không được hỗ trợ';
            }
        }

        $price = $product->price;
        $priceDiscount = $product->discount_price;
        $timeRemaining = null;

        $code = $request->input('code');

        if ($product->productOptions->isNotEmpty()) {
            if ($code) {
                $productOption = $product->productOptions->firstWhere('id', $code);
            } else {
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
            } else {
                $priceDiscount = null;
            }
        }

        $discountPercentage = round((($price - $priceDiscount) / $price) * 100);

        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(20) // Số lượng sản phẩm gợi ý, thay đổi nếu cần
            ->get();

        return view(
            'guest.product.show',
            compact(
                'product',
                'price',
                'priceDiscount',
                'discountPercentage',
                'timeRemaining',
                'productOption',
                'codeDelivery',
                'timeDeliveryResult',
                'coupons',
                'relatedProducts'
            )
        );
    }

    public function guestGetById($id)
    {
        $product = Product::with('productOptions')->find($id);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}