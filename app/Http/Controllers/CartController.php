<?php
    

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user(); // Ensure the user is authenticated
    
        // Validate the request (optional)
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
    
        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();
    
        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $request->quantity
            ]);
        }
    
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    // Method to display the cart items
    public function index()
    {
        // Use Auth::id() to get the authenticated user's ID
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        
        return view('cart.index', compact('cartItems'));

    }
    public function destroy($id)
    {
        $cart = Cart::where('product_id', $id)->first();
        if ($cart) {
            $cart->delete();
        }
        
       // return to_route('cart.index');
   
      
           }
    
           public function update(Request $request, $productId)
{
    $user = Auth::user();
    
    // Validate the new quantity
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    // Find the cart item and update its quantity
    $cartItem = Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->first();

    if ($cartItem) {
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    }

    return redirect()->route('cart.index');
}

}
