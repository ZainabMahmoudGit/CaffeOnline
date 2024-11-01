<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(["index"]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $products = Product::paginate(8); // 8 products per page

        $products = Product::all();
        return view("products.index", ["products" => $products] );
    }

    
    public function create()
    {
        $categorys = Category::all();
        return view("products.create", ["categorys" => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->middleware("check.track.name");

    

        $request->validate([
            "ProductName"=>"required|min:2|unique:products", 
            "description"=>"string", 
            "PriceBeforeDiscount" => "integer", 
            "Discount" => "integer", 
            "PriceAfterDiscount" => "integer", 
          "image"=> "required|image|mimes:jpg,png,jpeg,gi,png."
 
        ],[
            "ProductName.required" => "Product Name Is Required, Please Fill the Field",
            "ProductName.min" => "Product Name Is not Valid",
            "PriceBeforeDiscount.required" => "Price Name Is Required, Please Fill the Field",
            "image.required" => "Product Image Is Required"
        
    
        ]);

        if($request->hasFile("image")){
      
            $imageName = time().".".$request->image->extension();
         
            $request->image->move(public_path("images"), $imageName);
                $products = new Product();
            $products->ProductName = $request->ProductName;    
            $products->description = $request->description;
            $products->PriceBeforeDiscount = $request->PriceBeforeDiscount;
            $products->Discount = $request->Discount;
            $products->PriceAfterDiscount = $request->PriceAfterDiscount;
            $products->quantity =  $request->quantity;
            $products->image = $imageName;
         
            $products->category_id = request()->input("category_id");

            $products->save();
            return to_route("products.index");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view("products.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
  
    {  $categorys = Category::all();
  
           return view("products.edit", ["product" => $product,"categorys"=>$categorys]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "ProductName"=>"required|min:2|".Rule::unique('products')->ignore($product->id), 
        ]);
        $product->update($request->all());
        return to_route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route("products.index");
    }

    public function getProductsByCategory($category)
    {
        $products = Product::whereHas('category', function ($query) use ($category) {
            $query->where('CategoryName', $category);
        })->get();
    
        return view('products.index', compact('products'));
    }
    
    
    
}















