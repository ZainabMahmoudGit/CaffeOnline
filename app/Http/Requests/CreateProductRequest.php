<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "ProductName"=>"required|min:2|unique:products", 
            "PriceBeforeDiscount" => "integer",
            "Discount" => "integer",
             "PriceAfterDiscount" => "integer",
             "image" => "required|image|mimes:jpg,png,jpeg,gif",
             "quantity" => "nullable|integer",
            "category_id" => "required"
          ];
    }
}
