<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Policy;
use App\Models\SubCategory;
use App\Models\SellerShop;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(18);
        $categories = Category::all();
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
        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'brands', 'unseenmessages', 'reviews', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function singleProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        $category = $product->category;
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->get();
        $reviews = Review::where('product_id', $id)->get();

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

        $shopid = $product->shop_id;
        $userid = SellerShop::where('id', $shopid)->value('user_id');

        // $shopId = $product->pluck('product.shop_id')->unique();

        // $shop_user_id = $shopId->first();

        $policies = Policy::where('shop_id', $shopid)->get();
        // dd($policies);

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('productDetails', compact('product', 'shopid', 'userid', 'unseenmessages', 'brands', 'relatedProducts', 'reviews', 'categories', 'totalPrice', 'totalItems', 'cart', 'policies'));
    }

    public function shopPolicies($id){
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
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
 
        $policy = Policy::where('id', $id)->first();

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('shopPolicy', compact('products', 'unseenmessages', 'policy',  'brands', 'reviews', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }


    public function showProductsByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::where('category_id', $category->id);

        if (request()->has('brand_id')) {
            $products->where('Brand_id', request('brand_id'));
        }

        $products = $products->get();

        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->get();

        $totalPrice = $cart->sum(function ($item) {
            return $item->product->discountedPrice ?? $item->product->price;
        });

        $totalItems = $cart->sum('quantity');

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'unseenmessages', 'brands', 'category', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function showProductsByBrand($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::where('Brand_id', $brand->id);

        if (request()->has('category_id')) {
            $products->where('category_id', request('category_id'));
        }

        $products = $products->get();

        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->get();

        $totalPrice = $cart->sum(function ($item) {
            return $item->product->discountedPrice ?? $item->product->price;
        });

        $totalItems = $cart->sum('quantity');

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'unseenmessages', 'brands', 'brand', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function showProductsBysubcategory($subcategoryId)
    {
        $categories = Category::all();
        $brand = Brand::all();
        $brands = Brand::all();

        $subcategory = SubCategory::find($subcategoryId);
        $products = Product::where('SubCategory_id', $subcategory->id)->get();

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

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'unseenmessages', 'brands', 'subcategory', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function showProducts(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::query();

        if ($request->has('category_id')) {
            $products->where('category_id', $request->category_id);
        }

        if ($request->has('brand_id')) {
            $products->where('brand_id', $request->brand_id);
        }

        $products = $products->get();

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

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'brands', 'unseenmessages', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }

    public function searchProducts(Request $request)
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

        $searchText = $request->input('serachProducts');

        // $products = Product::where('name', 'like', "%$searchText%")
        //     ->orWhereHas('category', function ($query) use ($searchText) {
        //         $query->where('name', 'like', "%$searchText%");
        //     })
        //     ->orWhere('sku', 'like', "%$searchText%")
        //     ->get();

        $products = Product::where('name', 'like', "%$searchText%")
            ->orWhere('sku', 'like', "%$searchText%")
            ->orWhereHas('category', function ($query) use ($searchText) {
                $query->where('name', 'like', "%$searchText%");
            })
            ->orWhereHas('brand', function ($query) use ($searchText) {
                $query->where('name', 'like', "%$searchText%");
            })
            ->orWhere('description', 'like', "%$searchText%")
            ->orWhereHas('subcategory', function ($query) use ($searchText) {
                $query->where('name', 'like', "%$searchText%");
            })
            ->get();

            $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('ShopPage', compact('products', 'unseenmessages', 'brands', 'categories', 'totalPrice', 'totalItems', 'cart'));
    }
}
