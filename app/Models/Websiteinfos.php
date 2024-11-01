<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websiteinfos extends Model
{
    use HasFactory;
    protected $table = 'websiteinfos'; 

    protected $fillable = ['WebsiteName','WebsiteEmail','WebsitePhone','image'];
    
}
