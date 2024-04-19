<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SellerShop;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

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

        return view('categories', compact('shopInfo', 'cat_count', 'pro_count', 'rev_count', 'categories', 'products'));
    }

    public function add()
    {
        return view('addCategories');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CategoriesName' => 'required|string',
            'CategoriesDescription' => 'nullable|string',
            'CategoryImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('CategoryImage')) {
            $image = $request->file('CategoryImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs( 'public/uploads', $imageName);
            $imagePath = $imageName;
        } else {
            $imagePath = null;
        }

        $shopId = SellerShop::where('user_id', auth()->id())->value('id');

        $category = new Category();
        $category->user_id = auth()->id();
        $category->seller_shop_id = $shopId;
        $category->name = $request->input('CategoriesName');
        $category->description = $request->input('CategoriesDescription');
        $category->image_url = $imagePath;

        // dd($category);
        $category->save();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();

        return redirect()->back()->with('success', 'Category added to collection successfully!');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->editCategoryName;
        $category->description = $request->editCategoryDescription;

        $category->save();

        return redirect()->back()->with('update_success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function toggleCategoryState(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'category not found.');
        }

        $category->state = $request->input('state');
        $category->save();

        return redirect()->back()->with('state_success', 'category state toggled successfully.');
    }

    public function activateAllCategories()
    {
        Category::query()->update(['state' => 1]);

        return redirect()->back()->with('activate_success', 'All Category activated successfully.');
    }

    public function deactivateAllCategories()
    {
        Category::query()->update(['state' => 0]);

        return redirect()->back()->with('deactivate_success', 'All Category deactivated successfully.');
    }
}
