<?php
use App\Http\Controllers\api\AboutController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\WebsiteinfosController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("apihome",HomeController::class);
Route::apiResource("apiabout",AboutController::class);
Route::apiResource("apicategorys",CategoryController::class);
Route::apiResource("apicontacts",ContactController::class);
Route::apiResource("apiproducts",ProductController::class);
Route::apiResource("apiwebsiteinfo",WebsiteinfosController::class);

Route::middleware('auth:sanctum')->group(function () {

  Route::get('/apicart', [CartController::class, 'index']); // Get the cart items
  Route::post('/apicart', [CartController::class, 'store']); // Add to cart
  Route::delete('/apicart/{productId}', [CartController::class, 'destroy']); // Remove from cart
});

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/apiwishlist', [WishlistController::class, 'index']); // Get the wishlist
  Route::post('/apiwishlist', [WishlistController::class, 'store']); // Add to wishlist
  Route::delete('/apiwishlist/{productId}', [WishlistController::class, 'destroy']); // Remove from wishlist
});




/*
-------------------product---------------------

  GET|HEAD        api/apiproducts .................................... apiproducts.index › api\ProductController@index
  POST            api/apiproducts .................................... apiproducts.store › api\ProductController@store
  GET|HEAD        api/apiproducts/{apiproduct} ......................... apiproducts.show › api\ProductController@show
  PUT|PATCH       api/apiproducts/{apiproduct} ..................... apiproducts.update › api\ProductController@update
  DELETE          api/apiproducts/{apiproduct} ................... apiproducts.destroy › api\ProductController@destroy

  -------------------categorys---------------------

  GET|HEAD        api/apicategorys ................................. apicategorys.index › api\CategoryController@index
  POST            api/apicategorys ................................. apicategorys.store › api\CategoryController@store
  GET|HEAD        api/apicategorys/{apicategory} ..................... apicategorys.show › api\CategoryController@show
  PUT|PATCH       api/apicategorys/{apicategory} ................. apicategorys.update › api\CategoryController@update
  DELETE          api/apicategorys/{apicategory} ............... apicategorys.destroy › api\CategoryController@destroy


    -------------------contacts---------------------

  GET|HEAD        api/apicontacts .................................... apicontacts.index › api\ContactController@index
  POST            api/apicontacts .................................... apicontacts.store › api\ContactController@store
  GET|HEAD        api/apicontacts/{apicontact} ......................... apicontacts.show › api\ContactController@show
  PUT|PATCH       api/apicontacts/{apicontact} ..................... apicontacts.update › api\ContactController@update
  DELETE          api/apicontacts/{apicontact} ................... apicontacts.destroy › api\ContactController@destroy
 
 
  -------------------websiteinfo---------------------

    GET|HEAD        api/apiwebsiteinfo ......................... apiwebsiteinfo.index › api\WebsiteinfosController@index
     PUT|PATCH       api/apiwebsiteinfo/{apiwebsiteinfo} ...... apiwebsiteinfo.update › api\WebsiteinfosController@update

   
  -------------------cart---------------------
  GET|HEAD        api/apicart .................. api\CartController@index
  POST            api/apicart ..................... api\CartController@store
  DELETE          api/apicart/{productId} ....... api\CartController@destroy
   

    -------------------Wishlist---------------------

    
   GET|HEAD        api/apiwishlist ........ Api\WishlistController@index
  POST            api/apiwishlist ........... Api\WishlistController@store
  DELETE          api/apiwishlist/{productId} ...... Api\WishlistController@destroy


    -------------------About---------------------

   GET|HEAD        api/apiabout ........ apiabout.index › api\AboutController@index
  PUT|PATCH       api/apiabout/{apiabout} .... apiabout.update › api\AboutController@update

      -------------------Home---------------------

  GET|HEAD        api/apihome ......... apihome.index › api\HomeController@index
  PUT|PATCH       api/apihome/{apihome}........ apihome.update › api\HomeController@update
  
  
  */

