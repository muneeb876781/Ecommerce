<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SellerShop;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function brands()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        if ($shopInfo) {
            $shopId = SellerShop::where('user_id', Auth::id())->value('id');
            $categories = Category::where('seller_shop_id', $shopId)->get();
            $cat_count = $categories->count();

            $shopId = SellerShop::where('user_id', Auth::id())->value('id');
            $products = Product::where('shop_id', $shopId)->get();
            $pro_count = $products->count();

            $brands = Brand::where('seller_shop_id', $shopId)->get();
            $brand_count = $brands->count();

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
            $brands = [];
            $brand_count = 0;
        }

        return view('brands', compact('shopInfo', 'brands', 'brand_count', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'ord_count', 'Orders'));
    }

    public function storeBrand(Request $request)
    {
        $validatedData = $request->validate([
            'BrandName' => 'required|string',
            'BrandImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('BrandImage')) {
            $image = $request->file('BrandImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $imagePath = $imageName;
        } else {
            $imagePath = null;
        }

        $shopId = SellerShop::where('user_id', auth()->id())->value('id');

        $brand = new Brand();
        $brand->user_id = auth()->id();
        $brand->seller_shop_id = $shopId;
        $brand->name = $request->input('BrandName');
        $brand->image_url = $imagePath;

        // dd($category);
        $brand->save();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $brands = Brand::where('seller_shop_id', $shopId)->get();

        return redirect()->back()->with('success', 'Brns added to collection successfully!');
    }

    public function edit(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validatedData = $request->validate([
            'editBrandName' => 'required|string',
            'editBrandImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('editBrandImage')) {
            $image = $request->file('editBrandImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $brand->image_url = $imageName;
        }

        $brand->name = $request->input('editBrandName');
        $brand->save();

        return redirect()->back()->with('success', 'Brand updated successfully!');
    }
}
