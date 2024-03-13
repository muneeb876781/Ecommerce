<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SellerShop;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;

use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function index()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();

        $subCategory = collect();
        foreach ($categories as $category) {
            $subCategories = SubCategory::where('category_id', $category->id)->get();
            $subCategory = $subCategory->merge($subCategories);
        }

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

        return view('subCategories', compact('shopInfo', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products', 'subCategory'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subCategoriesName' => 'required|string',
            'parentCategory' => 'required|exists:categories,id',
        ]);

        // if ($request->hasFile('CategoryImage')) {
        //     $image = $request->file('CategoryImage');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        //     $imagePath = 'images/' . $imageName;
        // } else {
        //     $imagePath = null;
        // }

        $shopId = SellerShop::where('user_id', auth()->id())->value('id');

        $category = new SubCategory();
        // $category->user_id = auth()->id();
        // $category->seller_shop_id = $shopId;
        $category->name = $request->input('subCategoriesName');
        $category->category_id = $request->input('parentCategory');
        // $category->image_url = $imagePath;

        // dd($category);
        $category->save();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();

        return redirect()->back()->with('success', 'Category added to collection successfully!');
    }
}
