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
use App\Models\User;
use App\Models\Brand;
use App\Models\Policy;
use App\Models\Banner;
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

    public function venderProfile()
    {
        $user_id = Auth::id();
        $seller = User::where('id', $user_id)->first();
        // dd($seller);
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

        return view('venderProfile', compact('shopInfo', 'seller', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'ord_count', 'Orders'));
    }

    public function sellerShop()
    {
        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
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

        return view('sellerShop', compact('products', 'brands', 'categories', 'subcategories', 'totalPrice', 'cart', 'totalItems'));
    }

    public function reviews()
    {
        return view('sellerReviews');
    }

    public function policies()
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

        $policies = Policy::where('shop_id', $shopId)->get();

        return view('venderPolicies', compact('shopInfo', 'policies', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'ord_count', 'Orders'));
    }

    public function storepolicy(Request $request)
    {
        $validatedData = $request->validate([
            'policyName' => 'required|string|max:255',
            'policyDescription' => 'required|string',
        ]);

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');

        $policy = new Policy();
        $policy->user_id = Auth::id();
        $policy->shop_id = $shopId;
        $policy->policy_name = $validatedData['policyName'];
        $policy->policy_description = $validatedData['policyDescription'];

        $policy->save();

        return redirect()->back()->with('success', 'Policy created successfully');
    }

    public function banners()
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

        $policies = Policy::where('shop_id', $shopId)->get();
        $banners = Banner::where('shop_id', $shopId)->get();
        $brands = Brand::where('seller_shop_id', $shopId)->get();

        return view('banners', compact('shopInfo', 'policies', 'brands', 'banners', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'ord_count', 'Orders'));
    }

    public function storeBanner(Request $request)
    {
        $user_id = auth()->id();
        $shopId = SellerShop::where('user_id', Auth::id())->value('id');

        $request->validate([
            'bannerBrand' => 'required|exists:brands,id',
            'BannerImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bannerRemoteImage' => 'nullable|url',

        ]);

        $banner = new Banner();
        $banner->user_id = $user_id;
        $banner->shop_id = $shopId;
        $banner->brand_id = $request->input('bannerBrand');

        if ($request->hasFile('BannerImage')) {
            $image = $request->file('BannerImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $imagePath = $imageName;
        } else {
            $imagePath = null;
        }

        $banner->image_url = $imagePath;
        $banner->remote_image_url = $request->input('bannerRemoteImage');
        $banner->save();

        return redirect()->back()->with('success', 'Banner added successfully.');
    }
}
