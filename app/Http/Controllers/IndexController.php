<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Templates;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    // public function index(){
    //     $products = Product::all();
    //     $categories = Category::all();

    //     return view('indexPage', compact('products', 'categories'));
    // }

    public function index()
    {
        // $products = Product::orderBy('created_at', 'desc')->get();
        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $reviews = Review::all();
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

        $banners = Banner::all();

        $template = Templates::where('state', 1)->first();

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();

        if ($template) {
            if ($template->name == 'General') {
                return view('mainPage', compact('products', 'banners', 'unseenmessages', 'reviews', 'brands', 'categories', 'subcategories', 'totalPrice', 'cart', 'totalItems'));
            } else {
                return view('indexPage', compact('products', 'banners', 'unseenmessages', 'reviews', 'brands', 'categories', 'subcategories', 'totalPrice', 'cart', 'totalItems'));
            }
        } else {
            return view('mainPage', compact('products', 'banners', 'unseenmessages', 'reviews', 'brands', 'categories', 'subcategories', 'totalPrice', 'cart', 'totalItems'));
        }
    }
}
