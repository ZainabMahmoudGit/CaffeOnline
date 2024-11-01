<?php

namespace App\Http\Controllers\Api;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    /**
     * Add product to wishlist.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id'); // Expect product_id from the request

        if ($userId) {
            // Check if the product already exists in the wishlist
            $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
            if (!$wishlistItem) {
                Wishlist::create(['user_id' => $userId, 'product_id' => $productId]);
                return response()->json([
                    'message' => 'Product added to wishlist',
                    'wishlistCount' => Wishlist::where('user_id', $userId)->count()
                ], 201);
            }
            return response()->json(['message' => 'Product already in wishlist'], 200);
        }

        return response()->json(['error' => 'You must be logged in to add to wishlist'], 401);
    }

    /**
     * Remove product from wishlist.
     */
    public function destroy($productId)
    {
        $userId = Auth::id();

        if ($userId) {
            $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
            if ($wishlistItem) {
                $wishlistItem->delete();
                return response()->json([
                    'message' => 'Product removed from wishlist',
                    'wishlistCount' => Wishlist::where('user_id', $userId)->count()
                ], 200);
            }
            return response()->json(['error' => 'Product not found in wishlist'], 404);
        }

        return response()->json(['error' => 'Unable to remove product from wishlist'], 401);
    }

    /**
     * Show all products in the wishlist.
     */
    public function index()
    {
        $userId = Auth::id();

        if ($userId) {
            $wishlists = Wishlist::with('product')->where('user_id', $userId)->get();
            return response()->json($wishlists, 200);
        }

        return response()->json(['error' => 'You must be logged in to view the wishlist'], 401);
    }
}
