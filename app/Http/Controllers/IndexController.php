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
use Illuminate\Support\Facades\Auth;
use Chatify\Facades\ChatifyMessenger as Chatify;

class IndexController extends Controller
{
    // public function index(){
    //     $products = Product::all();
    //     $categories = Category::all();

    //     return view('indexPage', compact('products', 'categories'));
    // }

    public function index($id = null)
    {
        $messenger_color = Auth::user()->messenger_color;
        $messengerColor = $messenger_color ? $messenger_color : Chatify::getFallbackColor();
        $dark_mode = Auth::user()->dark_mode < 1 ? 'light' : 'dark';

        // Your existing product-related code
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

        if ($template && $template->name == 'General') {
            $viewName = 'mainPage';
        } else {
            $viewName = 'indexPage';
        }

        return view($viewName, compact('products', 'banners', 'unseenmessages', 'reviews', 'brands', 'categories', 'subcategories', 'totalPrice', 'cart', 'totalItems', 'messengerColor', 'dark_mode', 'id'));
    }
}
