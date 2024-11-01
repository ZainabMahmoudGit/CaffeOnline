<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        return view("categorys.index", ["categorys" => $categorys] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("categorys.create");
    }

    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request)
     {
 
         $request->validate([
             "CategoryName"=>"required|min:2",
         ],[
             "CategoryName.required" => "Category Name Is Required, Please Fill the Field",
            
     
         ]);
 
        $categorys = new Category();
             $categorys->CategoryName = $request->CategoryName;
           
          
             $categorys->save();
             return to_route("categorys.index");
         }
     
 
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        return view("categorys.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
           return view("categorys.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "CategoryName"=>"required|min:2|".Rule::unique('categorys')->ignore($category->id), 
        ]);
        $category->update($request->all());
        return to_route("categorys.index");
    
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("categorys.index");
    }
}























