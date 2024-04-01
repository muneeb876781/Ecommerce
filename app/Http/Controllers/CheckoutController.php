<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SellerShop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Brand;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $categories = Category::all();
        $brands = Brand::all();

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

        return view('checkout', compact('cart', 'brands', 'categories', 'totalPrice', 'totalItems'));
    }
}
