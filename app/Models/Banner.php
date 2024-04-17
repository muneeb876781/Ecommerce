<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
