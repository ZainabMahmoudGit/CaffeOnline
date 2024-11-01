<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::all();
        $about= About::all();
        return view("home.index", ["home" => $home,"about"=> $about] );
   
    }
 

    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request)
     {
 
         $request->validate([
             "DescriptionLineOne"=>"string|min:10",
             "DescriptionLineTwo"=>"string|min:10",
             "DescriptionLineThree"=>"string|min:10",
         ],[
             "DescriptionLineOne.min" => "Description Min 10 letter, Please Fill the Field",
             "DescriptionLineTwo.min" => "Description Min 10 letter, Please Fill the Field",
             "DescriptionLineThree.min" => "Description Min 10 letter, Please Fill the Field",
            
     
         ]);
 
        $home = new Home();
             $home->DescriptionLineOne = $request->DescriptionLineOne;
           
             $home->DescriptionLineTwo = $request->DescriptionLineTwo;
         
             $home->DescriptionLineThree = $request->DescriptionLineThree;
         
             $home->save();
             return to_route("home.index");
         }
     
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
      
  
        return view("home.edit", ["home" => $home]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        $request->validate([
            "DescriptionLineOne"=>"string|min:10",
            "DescriptionLineTwo"=>"string|min:10",
            "DescriptionLineThree"=>"string|min:10",
        ]);
        $home->update($request->all());
        return to_route("home.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        $home->delete();
        return to_route("home.index");
    }
    }

