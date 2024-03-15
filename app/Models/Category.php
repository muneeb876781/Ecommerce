<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sellerShops()
    {
        return $this->belongsToMany(SellerShop::class);
    }

    // Category.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function subcategories()
    // {
    //     return $this->hasMany(Subcategory::class);
    // }
}
