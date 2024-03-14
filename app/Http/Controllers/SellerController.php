<?php

namespace App\Http\Controllers;
use App\Models\SellerShop;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        if ($shopInfo) {
            $shopId = SellerShop::where('user_id', Auth::id())->value('id');
            $categories = Category::where('seller_shop_id', $shopId)->get();
            $cat_count = $categories->count();

            $shopId = SellerShop::where('user_id', Auth::id())->value('id');
            $products = Product::where('shop_id', $shopId)->get();
            $pro_count = $products->count();

            $reviews = collect();
            foreach ($products as $product) {
                $productReviews = Review::where('product_id', $product->id)->get();
                $reviews = $reviews->merge($productReviews);
            }
            $rev_count = $reviews->count();

            $Orders = Order::where('shop_id', $shopId)->get();
            $ord_count = $Orders->count();
        } else {
            $cat_count = 0;
            $pro_count = 0;
            $rev_count = 0;
            $ord_count = 0;
            $categories = [];
            $products = [];
            $reviews = [];
        }

        return view('venderDashboard', compact('shopInfo', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'ord_count', 'Orders'));
    }

    public function sellerShop()
    {
        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();

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

        return view('sellerShop', compact('products', 'categories','subcategories', 'totalPrice', 'cart', 'totalItems'));
    }

    public function reviews()
    {
        return view('sellerReviews');
    }
}
