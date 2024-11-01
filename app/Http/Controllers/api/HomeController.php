<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */ public function index()
    {
        $home = Home::all();
        $about = About::all();
        return response()->json([
            "home" => $home,
            "about" => $about
        ], 200); // Return JSON response
    }
   
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        $request->validate([
            "DescriptionLineOne" => "string|min:10",
            "DescriptionLineTwo" => "string|min:10",
            "DescriptionLineThree" => "string|min:10",
        ], [
            "DescriptionLineOne.min" => "DescriptionLineOne must be at least 10 characters.",
            "DescriptionLineTwo.min" => "DescriptionLineTwo must be at least 10 characters.",
            "DescriptionLineThree.min" => "DescriptionLineThree must be at least 10 characters.",
        ]);

        $home->update($request->all());
        return response()->json($home, 200); // Return updated resource with status 200
    }

    /**
     * Remove the specified resource from storage.
     */
  
}