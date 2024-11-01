<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             
        $validator = Validator::make($request->all(), [
            "UserName" => "required|min:2",
            "Email" => "required|email|string|max:255", 
            "Phone" => "string",
            "Message" => "required|string|min:10"
        ], [
            
            "UserName.required" => "User Name Is Required, Please Fill the Field",
            "UserName.min" => "User Name Must Be At Least 2 Characters Long",
            "Email.required" => "Email Is Required, Please Provide a Valid Email Address",
            "Email.email" => "Please enter a valid email address",
            "Email.string" => "Email Must Be A String",
            "Email.max" => "Email Must Not Exceed 255 Characters",
            "Phone.string" => "Phone Must Be A String",
            "Message.required" => "Message Is Required, Please Fill the Field",
            "Message.min" => "Message Name Must Be At Least 10 Characters Long"
         
        ]);
if($validator->fails()){
    return response($validator->errors()->all(), 400);
}
$contact = Contact::create($request->all());

$contact->save();
return response($contact, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $contact = Contact::findOrFail($id); 
        return (new ContactResource($contact))->response()->setStatusCode(200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $contact = Contact::findOrFail($id); 

       $validator = Validator::make($request->all(), [
    "UserName" => "required|min:2",
    "Email" => "required|email|string|max:255", 
    "Phone" => "string",
    "Message" => "required|string"
], [
    
    "UserName.required" => "User Name Is Required, Please Fill the Field",
    "UserName.min" => "User Name Must Be At Least 2 Characters Long",
    "Email.required" => "Email Is Required, Please Provide a Valid Email Address",
    "Email.email" => "Please enter a valid email address",
    "Email.string" => "Email Must Be A String",
    "Email.max" => "Email Must Not Exceed 255 Characters",
    "Phone.string" => "Phone Must Be A String",
    "Message.required" => "Message Is Required, Please Fill the Field"
]);

if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()->all()], 422);
}

        $contact->update($request->all());
        // return response($track, 201);
        return response()->json(['message' => "contact updated succcfully", 'data' => $contact], 201);
            }
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        
        $contact = Contact::findOrFail($id); 
     
         if (!$contact) {
             return response()->json(['error' => 'contact not found'], 404);
         }
 
         $contact->delete();
         return response()->json(['message' => "Deleted Successfully"], 200);
 
    }
}
