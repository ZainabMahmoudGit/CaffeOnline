<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            "ProductName" => ["required", Rule::unique('products')->ignore($this->route('product')->id)],
            "PriceBeforeDiscount" => "nullable|integer",
            "Discount" => "nullable|integer",
            "PriceAfterDiscount" => "nullable|integer",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif",
            "quantity" => "nullable|integer",
            "category_name" => "nullable|string"
        ];
    }
}
