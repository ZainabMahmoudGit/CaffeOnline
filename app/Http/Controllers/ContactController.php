<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
         if(!Gate::allows("is-admin")){
            abort(403);
         }
        // $products = Product::paginate(8); // 8 products per page
 
         $contacts = Contact::all();
         return view("contactus.index", ["contacts" => $contacts] );
     }
 
     
     public function create()
     {
         return view("contactus.create");
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         // $this->middleware("check.track.name");
 
     
 
         $request->validate([
         
             "UserName"=>"required|min:2", 
             "Email" => "required|string|max:255", 
             "Phone" => "string", 
             "Message" => "required|string"
  
         ],[
             "UserName.required" => "UserName Name Is Required, Please Fill the Field",
             "UserName.min" => "UserName Name Is not Valid",
             "Email.required" => "Email  Is Required, Please Fill the Field",
             "Message.required" => "Message  Is Required"
         
     
         ]);
 
                 $contacts = new Contact();
             $contacts->UserName = $request->UserName;
             $contacts->Email = $request->Email;
             $contacts->Phone = $request->Phone;
             $contacts->Message = $request->Message;
           
          
             $contacts->save();
             return to_route("home.index");

         
     }
 
     /**
      * Display the specified resource.
      */
     public function show(Contact $contact)
     {
         
         return view("contactus.show", ["contact" => $contact]);
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Contact $contact)
   
     { 
   
               }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request)
     {
            }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Contact $contact)
     {
         $contact->delete();
         return to_route("contactus.index");
     }
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
