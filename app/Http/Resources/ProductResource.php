<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "ProductName" => $this->ProductName,
            "PriceBeforeDiscount" => $this->PriceBeforeDiscount,
            "Discount" => $this->Discount,
            "PriceAfterDiscount" => $this->PriceAfterDiscount,
            "image" => $this->image,
            "quantity" => $this->quantity,
            "CategoryName" => $this->category ? $this->category->CategoryName : null,
              ];
    }
    
}
