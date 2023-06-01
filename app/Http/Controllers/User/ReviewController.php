<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Review;
use App\Models\Item;




class ReviewController extends Controller
{

    public function review($Orderid)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $Orderid)->first();
        $count = 1;
        // Check if the user has ordered the item
        if (!$order) {
            return redirect()->back()->with('error', 'You are not authorized to review this item.');
        }

        // Find the existing review for the user and item
        $existingReview = Review::where('user_id', $user->id)->where('item_id', $order->item_id)->first();

        return view('user.home.review', compact('order','count', 'existingReview'));
    }
    public function reviewPost(Request $request, $Orderid)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $Orderid)->first();
        // Check if the user has ordered the item
        if (!$order) {
            return redirect()->back()->with('error', 'You are not authorized to review this item.');
        }
        // Find the existing review for the user and item
        $existingReview = Review::where('user_id', $user->id)->where('item_id', $order->item_id)->first();
        // Validate the form data
        $validatedData = $request->validate([
            'product_rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        if ($existingReview) {
            // Update the existing review
            $existingReview->stars_rated = $validatedData['product_rating'];
            $existingReview->comment = $validatedData['comment'];
            $existingReview->save();
            $message = 'Review updated successfully.';
        } else {
            // Create a new review
            $review = new Review();
            $review->user_id = $user->id;
            $review->item_id = $order->item_id;
            $review->stars_rated = $validatedData['product_rating'];
            $review->comment = $validatedData['comment'];
            $review->save();
            $message = 'Review submitted successfully. Thanks for your review!';
            
            // Fetch the updated review after creating a new one
            $existingReview = $review;
            // Fetch the total number of reviews for the item
            $item = Item::find($order->item_id);
            $numReviews = $item->reviews()->count();
        }
        return redirect()->back()->with('success', $message);
    }

}
