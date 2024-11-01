<?php


namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ProductName" => "required|min:2|unique:products", 
            "PriceBeforeDiscount" => "integer",
            "Discount" => "integer",
            "PriceAfterDiscount" => "integer",
            "quantity" => "nullable|integer",
            "CategoryName" => "required"
        ], [
            // Custom error messages
            "ProductName.required" => "Product Name Is Required, Please Fill the Field",
            "ProductName.unique" => "Product Name Must Be Aready found",
            "PriceBeforeDiscount.integer" => "Price Before Discount Must Be An Integer",
            "Discount.integer" => "Discount Must Be An Integer",
            "PriceAfterDiscount.integer" => "Price After Discount Must Be An Integer",
            "quantity.integer" => "Quantity Must Be An Integer",
            "CategoryName.required" => "Category Name Is Required, Please Fill the Field"
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->all(), 400);
        }

        // Find the category using CategoryName
        $category = Category::where('CategoryName', $request->input('CategoryName'))->first();

        if (!$category) {
            return response(['error' => 'Category not found'], 404);
        }

        // Set category_id in the product
        $product = new Product($request->all());
        $product->category_id = $category->id;
        $product->save();

        return response($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            "ProductName" => [
                'required',
                Rule::unique('products')->ignore($product->id),
            ],
            "PriceBeforeDiscount" => "integer",
            "Discount" => "integer",
            "PriceAfterDiscount" => "integer",
            "quantity" => "nullable|integer",
            "CategoryName" => "required"
        ], [
            // Custom error messages
            "ProductName.required" => "Product Name Is Required, Please Fill the Field",
            "ProductName.unique" => "Product Name Must Be Unique",
            "PriceBeforeDiscount.integer" => "Price Before Discount Must Be An Integer",
            "Discount.integer" => "Discount Must Be An Integer",
            "PriceAfterDiscount.integer" => "Price After Discount Must Be An Integer",
            "quantity.integer" => "Quantity Must Be An Integer",
            "CategoryName.required" => "Category Name Is Required, Please Fill the Field"
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => "Errors", 'data' => $validator->errors()->all()], 422);
        }

        // Find the category using CategoryName
        $category = Category::where('CategoryName', $request->input('CategoryName'))->first();

        if (!$category) {
            return response(['error' => 'Category not found'], 404);
        }

        // Set category_id in the product before updating
        $product->category_id = $category->id;

        // Update the product
        $product->update($request->except('CategoryName'));

        return response()->json(['message' => "Product updated successfully", 'data' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productExists = Product::find($id);

        if (!$productExists) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $productExists->delete();
        return response()->json(['message' => "Deleted Successfully"], 200);
    }
}
