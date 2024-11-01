<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view("about.index", ["about" => $about] );
   
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            "VideoDescriptionLineOne"=>"string|min:10",
            "VideoDescriptionLineTwo"=>"string|min:10",
            "Title"=>"string|min:2",
            "header"=>"string|min:2",
            "AboutDescriptionOne"=>"string|min:10",
            "AboutDescriptionTwo"=>"string|min:10",
        ],[
            "VideoDescriptionLineOne.min" => "VideoDescriptionLineOne Min 10 letter, Please Fill the Field",
            "VideoDescriptionLineTwo.min" => "VideoDescriptionLineTwo Min 10 letter, Please Fill the Field",
            "Title.min" => "Title Min 2 letter, Please Fill the Field",
            "header.min" => "header Min 2 letter, Please Fill the Field",
            "AboutDescriptionOne.min" => "AboutDescriptionOne Min 10 letter, Please Fill the Field",
            "AboutDescriptionTwo.min" => "AboutDescriptionTwo Min 10 letter, Please Fill the Field",
           
    
        ]);

       $about = new About();
            $about->VideoDescriptionLineOne = $request->VideoDescriptionLineOne;
          
            $about->VideoDescriptionLineTwo = $request->VideoDescriptionLineTwo;
        
            $about->Title = $request->Title;
        
            $about->header = $request->header;
          
            $about->AboutDescriptionOne = $request->AboutDescriptionOne;
        
            $about->DescriptionLineThree = $request->DescriptionLineThree;
        
            $about->save();
            return to_route("about.index");
        }
    




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view("about.edit", ["about" => $about]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            "VideoDescriptionLineOne"=>"string|min:10",
            "VideoDescriptionLineTwo"=>"string|min:10",
            "Title"=>"string|min:2",
            "header"=>"string|min:2",
            "AboutDescriptionOne"=>"string|min:10",
            "AboutDescriptionTwo"=>"string|min:10",
        ]);
        $about->update($request->all());
        return to_route("about.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        
        $about->delete();
        return to_route("about.index");
    }
}
