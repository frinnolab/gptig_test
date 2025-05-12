<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserRating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = UserRating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ],
            [
                'rating' => $request->rating,
                'rating_datetime' => now(),
            ]
        );

        return response()->json(['message' => 'Rating submitted or updated.', 'data' => $rating], Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = UserRating::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $rating->update([
            'rating' => $request->rating,
            'rating_datetime' => now(),
        ]);

        return response()->json(['message' => 'Rating updated.', 'data' => $rating], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rating = UserRating::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $rating->delete();

        return response()->json(['message' => 'Rating deleted.'], Response::HTTP_CREATED);
    }

    public function productRatings()
    {
        $userId = Auth::id();

        $products = Product::with(['ratings' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
            ->withAvg('ratings', 'rating')
            ->get()
            ->map(function ($product) use ($userId) {
                $userRating = $product->ratings->first(); // current user's rating
                $timePassed = null;
                $activeTime = null;

                if ($userRating && $userRating->rating_datetime) {
                    $timePassed = Carbon::parse($userRating->rating_datetime)->diffInMinutes(now());
                    $activeTime = $timePassed > 30 ? 'active' : 'inactive';
                }

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'ratings' => round($product->ratings_avg_rating, 2),
                    'user_rating' => $userRating?->rating,
                    'time_passed' => $timePassed,
                    'active_time' => $activeTime,
                ];
            });

        return response()->json($products);
    }

    public function rateProduct(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5', // assuming ratings are between 1 and 5
        ]);

        $userId = Auth::id();

        // Check if user has already rated the product
        $existingRating = UserRating::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($existingRating) {
            return response()->json(['message' => 'You have already rated this product.'], Response::HTTP_BAD_REQUEST);
        }

        // Create new rating
        UserRating::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'rating' => $request->rating,
        ]);

        return response()->json(['message' => 'Rating added successfully.'], Response::HTTP_CREATED);
    }

    public function removeRating(Product $product)
    {
        $userId = Auth::id();

        // Check if the user has rated the product
        $rating = UserRating::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if (!$rating) {
            return response()->json(['message' => 'No rating found to remove.'], Response::HTTP_NOT_FOUND);
        }

        // Delete the rating
        $rating->delete();

        return response()->json(['message' => 'Rating removed successfully.'], Response::HTTP_OK);
    }

    public function changeRating(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $userId = Auth::id();

        // Check if the user has already rated the product
        $rating = UserRating::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if (!$rating) {
            return response()->json(['message' => 'No rating found to change.'], Response::HTTP_NOT_FOUND);
        }

        // Update the rating
        $rating->update(['rating' => $request->rating]);

        return response()->json(['message' => 'Rating updated successfully.'], Response::HTTP_OK);
    }
}
