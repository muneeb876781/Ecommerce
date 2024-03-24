<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Cart;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();

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

        return view('ShopPage', compact('products', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function singleProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        $category = $product->category;
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->get();
        $reviews = Review::where('product_id', $id)->get();
        // dd($relatedProducts);

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

        return view('productDetails', compact('product', 'relatedProducts', 'reviews', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function showProductsByCategory($categoryId)
    {
        $categories = Category::all();

        $category = Category::find($categoryId);
        $products = Product::where('category_id', $category->id)->get();

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

        return view('ShopPage', compact('products', 'category', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function searchProducts(Request $request)
    {
        $categories = Category::all();

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

        $searchText = $request->input('serachProducts');


        $products = Product::where('name', 'like', "%$searchText%")
            ->orWhereHas('category', function ($query) use ($searchText) {
                $query->where('name', 'like', "%$searchText%");
            })
            ->orWhere('sku', 'like', "%$searchText%")
            ->get();

        return view('ShopPage', compact('products', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }
}
