<?php
  namespace App\Http\Controllers;

  use App\Models\Wishlist;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  
  class WishlistController extends Controller
  {



    public function add($productId)
    {
        $userId = Auth::id();
        if ($userId) {
            Wishlist::create(['user_id' => $userId, 'product_id' => $productId]);
            return redirect()->back()->with('message', 'Product added to wishlist')->with('wishlistCount', Wishlist::where('user_id', $userId)->count());
        }
        return redirect()->back()->with('error', 'You must be logged in to add to wishlist');
    }
    
    public function remove($productId)
    {
        $userId = Auth::id();
        if ($userId) {
            $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
            if ($wishlistItem) {
                $wishlistItem->delete();
                return redirect()->back()->with('message', 'Product removed from wishlist')->with('wishlistCount', Wishlist::where('user_id', $userId)->count());
            }
        }
        return redirect()->back()->with('error', 'Unable to remove product from wishlist');
    }
    

    public function showWishlist()
    {
        $userId = Auth::id();
        $wishlists = Wishlist::with('product')->where('user_id', $userId)->get();

        return view('wishlist.index', compact('wishlists'));
    }


  }
  