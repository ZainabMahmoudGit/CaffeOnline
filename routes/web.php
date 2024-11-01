<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteinfosController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource( "dash", DashController::class); 

Route::resource("home", HomeController::class);

Route::resource("about", AboutController::class);

Route::resource("products", ProductController::class); 


Route::resource("contactus", ContactController::class); 

Route::resource("websiteinfos", WebsiteinfosController::class); 

Auth::routes();
Route::get('/layouts.app', function () {
    return view('layouts.app');
});



Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add')->middleware('auth');
Route::post('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.index')->middleware('auth');

Route::get('products/category/{category}', [ProductController::class, 'getProductsByCategory'])->name('products.category');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');


 Route::post('/payment', [PaypalController::class, 'payment'])->name('payment');

 Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
 
 Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');
