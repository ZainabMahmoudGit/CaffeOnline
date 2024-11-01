<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteinfosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    { 
        return [
        "WebsiteName" => $this->WebsiteName,
        "WebsiteEmail" => $this->WebsiteEmail,
        "WebsitePhone" => $this->WebsitePhone,
          "image" => $this->image,
           ];
    }
}
