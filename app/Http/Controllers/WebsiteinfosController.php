<?php

namespace App\Http\Controllers;

use App\Models\Websiteinfos;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class WebsiteinfosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    //  public function __construct(){
    //     // Authorize access only to admins
    //     $this->middleware(function ($request, $next) {
    //         if (!Gate::allows('is-admin')) {
    //             abort(403, 'Unauthorized access');
    //         }
    //         return $next($request);
    //     });
    // }
    public function index()
    {
       
        $websiteinfos = Websiteinfos::all();
        return view("websiteinfos.index", ["websiteinfos" => $websiteinfos] );
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("products.create");
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            "WebsiteName"=>"required|min:2", 
            "WebsiteEmail" => "email", 
            "WebsitePhone" => "string", 
          "image"=> "required|image|mimes:jpg,png,jpeg,gi,png."
 
        ],[
            "WebsiteName.required" => "Website Name Is Required, Please Fill the Field",
            "WebsiteEmail.email" => 'Please Enter a Valid Email Address', 
            "WebsitePhone.string" => "Please Enter a Valid  Website Phone",
            "image.required" => "Website logo Image Is Required"
        
    
        ]);

        if($request->hasFile("image")){
      
            $imageName = time().".".$request->image->extension();
         
            $request->image->move(public_path("images"), $imageName);
                $websiteinfos = new Websiteinfos();
            $websiteinfos->WebsiteName = $request->WebsiteName;
            $websiteinfos->WebsiteEmail = $request->WebsiteEmail;
            $websiteinfos->WebsitePhone = $request->WebsitePhone;
             $websiteinfos->image = $imageName;
                     $websiteinfos->save();
            return to_route("websiteinfos.index");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Websiteinfos $websiteinfo)
    {
        //websiteinfos
         return view("websiteinfos.show", ["websiteinfo" => $websiteinfo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
// In WebsiteinfosController.php
public function edit(Websiteinfos $websiteinfo)
{
    // Return the edit view with the data
    return view('websiteinfos.edit', ['websiteinfo' => $websiteinfo]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Websiteinfos $websiteinfo)
    {
        $request->validate([
            'WebsiteName' => 'required|string|min:2',
            'WebsiteEmail' => 'required|email',
            'WebsitePhone' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048' // Adjust validation rules as needed
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $websiteinfo->image = $imageName;
        }
    
        $websiteinfo->update([
            'WebsiteName' => $request->input('WebsiteName'),
            'WebsiteEmail' => $request->input('WebsiteEmail'),
            'WebsitePhone' => $request->input('WebsitePhone'),
            // Update image only if a new one is uploaded
            'image' => $request->hasFile('image') ? $imageName : $websiteinfo->image
        ]);
        return to_route("products.index");
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Websiteinfos $websiteinfo)
    {
        //
        $websiteinfo->delete();
        return to_route("websiteinfos.index");
    }
}
