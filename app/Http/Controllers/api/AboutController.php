<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
       public function index()
    {
        $about = About::all();
        return response()->json($about, 200);  // Return all data as JSON with status 200
    }



  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id); 
        $request->validate([
            "VideoDescriptionLineOne" => "string|min:10",
            "VideoDescriptionLineTwo" => "string|min:10",
            "Title" => "string|min:2",
            "header" => "string|min:2",
            "AboutDescriptionOne" => "string|min:10",
            "AboutDescriptionTwo" => "string|min:10",
        ], [
            "VideoDescriptionLineOne.min" => "VideoDescriptionLineOne must be at least 10 letters long.",
            "VideoDescriptionLineTwo.min" => "VideoDescriptionLineTwo must be at least 10 letters long.",
            "Title.min" => "Title must be at least 2 letters long.",
            "header.min" => "Header must be at least 2 letters long.",
            "AboutDescriptionOne.min" => "AboutDescriptionOne must be at least 10 letters long.",
            "AboutDescriptionTwo.min" => "AboutDescriptionTwo must be at least 10 letters long.",
        ]);

        $about->update($request->all());
        return response()->json($about, 200);  // Return the updated resource with status 200
    }

}