<?php

namespace App\Http\Controllers;

use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $rating = UserRating::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'rating_datetime' => now(),
        ]);

        return response()->json(['message' => 'Rating submitted.', 'data' => $rating], 201);
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

        return response()->json(['message' => 'Rating updated.', 'data' => $rating]);
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

        return response()->json(['message' => 'Rating deleted.']);
    }
}
