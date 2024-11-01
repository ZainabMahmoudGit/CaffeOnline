<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["ProductName", 
    "PriceBeforeDiscount", "Discount", "PriceAfterDiscount", 
    "image","quantity","category_id","description"];

    function category(){
        return $this->belongsTo(Category::class);
        
    }
 
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
