<?php

namespace App\Http\Controllers;
use App\Models\SellerShop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubCategory;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class SellerShopController extends Controller
{
    public function createShop(Request $request)
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        $validatedData = $request->validate([
            'shopname' => 'required|string|max:255',
            'shopdescription' => 'required|string',
            'shopaddress' => 'required|string',
            'sellerphone' => 'required|string',
            'selleraddress' => 'required|string',
            'shopLogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shopBanner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('shopLogo')) {
            $image = $request->file('shopLogo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $logoImagePath = $image->storeAs('public/uploads', $imageName);
        } else {
            $logoImagePath = null;
        }

        if ($request->hasFile('shopBanner')) {
            $image = $request->file('shopBanner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $bannerImagePath = $image->storeAs( 'public/uploads', $imageName);
        } else {
            $bannerImagePath = null;
        }

        $userId = Auth::id();

        $shop = new SellerShop();
        $shop->user_id = $userId;
        $shop->name = $request->input('shopname');
        $shop->description = $request->input('shopdescription');
        $shop->address = $request->input('shopaddress');
        $shop->logo = $logoImagePath;
        $shop->banner = $bannerImagePath;
        $shop->seller_phone = $request->input('sellerphone');
        $shop->seller_address = $request->input('selleraddress');

        // dd($shop);
        $shop->save();

        $user = auth()->user();
        $user->role = 'seller';
        $user->save();

        $Orders = []; 

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

        return view('venderDashboard', compact('shopInfo', 'cat_count', 'pro_count', 'rev_count', 'products', 'categories', 'ord_count', 'Orders'));
    }

    public function delete($id)
    {
        $shop = SellerShop::findOrFail($id);

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $products = Product::where('shop_id', $shopId)->get();
        foreach ($products as $product) {
            $product->delete();
        }

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();
        foreach ($categories as $category) {
            $category->delete();
        }

        $user = auth()->user();
        $user->role = 'user';
        $user->save();

        $shop->delete();

        return view('indexPage');
    }
}
