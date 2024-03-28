<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Review;

class IndexController extends Controller
{
    // public function index(){
    //     $products = Product::all();
    //     $categories = Category::all();

    //     return view('indexPage', compact('products', 'categories'));
    // }

    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $reviews = Review::all();


        $user_id = auth()->id();

        $cart = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;
        foreach ($cart as $item) {
            if ($item->product->discountedPrice) {
                $totalPrice += $item->product->discountedPrice * $item->quantity;
            } else {
                $totalPrice += $item->product->price * $item->quantity;
            }
            
            
        }

        $totalItems = $cart->sum('quantity');

        return view('mainPage', compact('products', 'reviews', 'categories','subcategories', 'totalPrice', 'cart', 'totalItems'));
    }
}
