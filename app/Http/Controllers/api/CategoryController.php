<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        return CategoryResource::collection($categorys);

        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            "CategoryName" => "required|min:2",
        ], [
            "CategoryName.required" => "Category Name Is Required, Please Fill the Field",
            "CategoryName.min" => "Category Name Must Be At Least 2 Characters Long",
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
        
$category = Category::create($request->all());

$category->save();
return response($category, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { $category = Category::findOrFail($id); 
     
        return (new CategoryResource($category))->response()->setStatusCode(200);

    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id); 
     

$validator = Validator::make($request->all(),
[
    "CategoryName" => [
        'required',
        Rule::unique('categorys')->ignore($category->id),
    ], [
        // Custom error messages
        "CategoryName.required" => "Category Name Is Required, Please Fill the Field",
        "CategoryName.unique" => "Category Name Must Be Unique",
           ]]);
    
if($validator->fails()){
    // return response($validator->errors()->all(), 422);
    return response()->json(['message' => "Errors", 'data' => $validator->errors()->all()], 422);
}
$category->update($request->all());
// return response($track, 201);
return response()->json(['message' => "category updated succcfully", 'data' => $category], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {    $category = Category::findOrFail($id); 
        if (!$category) {
            return response()->json(['error' => 'category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => "Deleted Successfully"], 200);

    }
}
