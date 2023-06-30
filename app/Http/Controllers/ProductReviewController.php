<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function guestStore(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'review_title' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        // Create a new review instance
        $review = new ProductReview();
        $review->product_id = $request->input('product_id');
        $review->name = $validatedData['name'];
        $review->email = $validatedData['email'];
        $review->review_title = $validatedData['review_title'];
        $review->rating = $validatedData['rating'];
        $review->comment = $validatedData['comment'];

        // Save the review
        $review->save();

        // Optionally, you can associate the review with a product or other related models

        // Redirect back to the product detail page or wherever you want
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}