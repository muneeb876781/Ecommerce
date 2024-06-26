<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SellerShop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->orderBy('created_at', 'desc')->get();
        $cat_count = $categories->count();

        $subCategory = collect();
        foreach ($categories as $category) {
            $subCategories = SubCategory::where('category_id', $category->id)->get();
            $subCategory = $subCategory->merge($subCategories);
        }

        $brands = Brand::where('seller_shop_id', $shopId)->get();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $products = Product::where('shop_id', $shopId)->orderBy('created_at', 'desc')->get();
        $pro_count = $products->count();

        $reviews = collect();
        foreach ($products as $product) {
            $productReviews = Review::where('product_id', $product->id)->get();
            $reviews = $reviews->merge($productReviews);
        }

        $rev_count = $reviews->count();

        $productAttributes = ProductAttribute::all();

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('products', compact('shopInfo', 'cat_count', 'unseenmessages', 'pro_count', 'rev_count', 'categories', 'products', 'subCategory', 'brands', 'productAttributes'));
    }

    public function add()
    {
        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();
        return view('addProduct', ['categories' => $categories]);
    }

    public function editproduct($id){
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->orderBy('created_at', 'desc')->get();
        $cat_count = $categories->count();

        $subCategory = collect();
        foreach ($categories as $category) {
            $subCategories = SubCategory::where('category_id', $category->id)->get();
            $subCategory = $subCategory->merge($subCategories);
        }

        $brands = Brand::where('seller_shop_id', $shopId)->get();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $products = Product::where('shop_id', $shopId)->orderBy('created_at', 'desc')->get();
        $pro_count = $products->count();

        $reviews = collect();
        foreach ($products as $product) {
            $productReviews = Review::where('product_id', $product->id)->get();
            $reviews = $reviews->merge($productReviews);
        }

        $rev_count = $reviews->count();

        $productAttributes = ProductAttribute::all();

        $editProduct = Product::find($id);

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('editProducts', compact('shopInfo', 'cat_count', 'editProduct', 'unseenmessages', 'pro_count', 'rev_count', 'categories', 'products', 'subCategory', 'brands', 'productAttributes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'productDescription' => 'required|string',
            'productSpecification' => 'required|string',
            'productPrice' => 'required|numeric',
            'productDiscountPrice' => 'nullable|numeric',
            'productCategory' => 'required|exists:categories,id',
            'productSubCategory' => 'required|numeric',
            'productBrand' => 'required|numeric',
            'productImage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia1Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia2Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia3Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productVideo' => 'file|mimes:mp4,mov,avi,wmv|max:100000',
            'productQuantity' => 'required|integer',
            'productSKU' => 'nullable|string',
        ]);

        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $imagePath = $imageName;
        } else {
            $imagePath = null;
        }

        if ($request->hasFile('productMedia1Image')) {
            $image1 = $request->file('productMedia1Image');
            $imageName1 = time() . '_1.' . $image1->getClientOriginalExtension();
            $media1Path = $image1->storeAs('public/uploads', $imageName1);
            $media1Path = $imageName1;
        } else {
            $media1Path = null;
        }

        if ($request->hasFile('productMedia2Image')) {
            $image2 = $request->file('productMedia2Image');
            $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
            $media2Path = $image2->storeAs('public/uploads', $imageName2);
            $media2Path = $imageName2;
        } else {
            $media2Path = null;
        }

        if ($request->hasFile('productMedia3Image')) {
            $image3 = $request->file('productMedia3Image');
            $imageName3 = time() . '_3.' . $image3->getClientOriginalExtension();
            $media3Path = $image3->storeAs('public/uploads', $imageName3);
            $media3Path = $imageName3;
        } else {
            $media3Path = null;
        }

        if ($request->hasFile('productVideo')) {
            $video = $request->file('productVideo');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/uploads', $videoName, 'uploads');
        } else {
            $videoPath = null;
        }

        $shopId = SellerShop::where('user_id', auth()->id())->value('id');

        $product = new Product();
        $product->user_id = auth()->id();
        $product->shop_id = $shopId;
        $product->name = $request->input('productName');
        $product->description = $request->input('productDescription');
        $product->specification = $request->input('productSpecification');
        $product->price = $request->input('productPrice');
        $product->discountedPrice = $request->input('productDiscountPrice');
        $product->category_id = $request->input('productCategory');
        $product->SubCategory_id = $request->input('productSubCategory');
        $product->Brand_id = $request->input('productBrand');
        $product->quantity = $request->input('productQuantity');
        $product->sku = $request->input('productSKU');
        $product->remote_image_url = $request->input('productImageURL');
        $product->remote_media1_url = $request->input('media11mageURL');
        $product->remote_media2_url = $request->input('media12mageURL');
        $product->remote_media3_url = $request->input('media13mageURL');
        $product->remote_video_url = $request->input('productVideoURL');
        $product->image_url = $imagePath;
        $product->media1_url = $media1Path;
        $product->media2_url = $media2Path;
        $product->media3_url = $media3Path;

        $product->video_url = $videoPath;

        $product->save();

        $productId = $product->id;

        $productId = $product->id;

        foreach ($request->input('attributeValues', []) as $attributeId => $attributeValue) {
            if ($attributeValue !== null && isset($attributeValue['value'])) {
                $values = explode(',', $attributeValue['value']);

                foreach ($values as $value) {
                    $attributeValueModel = new AttributeValue();
                    $attributeValueModel->product_id = $productId;
                    $attributeValueModel->product_attribute_id = $attributeId;
                    $attributeValueModel->value = $value;
                    $attributeValueModel->save();
                }
            }
        }

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $products = Product::where('shop_id', $shopId)->get();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();

        return redirect()->back()->with('success', 'Product added to collection successfully!');
    }

    public function saveproductchanges(Request $request, $id)
    {
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'productDescription' => 'required|string',
            'productSpecification' => 'required|string',
            'productPrice' => 'required|numeric',
            'productDiscountPrice' => 'nullable|numeric',
            'productCategory' => 'required|exists:categories,id',
            'productSubCategory' => 'required|numeric',
            'productBrand' => 'required|numeric',
            'productImage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia1Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia2Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productMedia3Image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'productVideo' => 'file|mimes:mp4,mov,avi,wmv|max:100000',
            'productQuantity' => 'required|integer',
            'productSKU' => 'nullable|string',
        ]);

        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $imagePath = $imageName;
        } else {
            $imagePath = null;
        }

        if ($request->hasFile('productMedia1Image')) {
            $image1 = $request->file('productMedia1Image');
            $imageName1 = time() . '_1.' . $image1->getClientOriginalExtension();
            $media1Path = $image1->storeAs('public/uploads', $imageName1);
            $media1Path = $imageName1;
        } else {
            $media1Path = null;
        }

        if ($request->hasFile('productMedia2Image')) {
            $image2 = $request->file('productMedia2Image');
            $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
            $media2Path = $image2->storeAs('public/uploads', $imageName2);
            $media2Path = $imageName2;
        } else {
            $media2Path = null;
        }

        if ($request->hasFile('productMedia3Image')) {
            $image3 = $request->file('productMedia3Image');
            $imageName3 = time() . '_3.' . $image3->getClientOriginalExtension();
            $media3Path = $image3->storeAs('public/uploads', $imageName3);
            $media3Path = $imageName3;
        } else {
            $media3Path = null;
        }

        if ($request->hasFile('productVideo')) {
            $video = $request->file('productVideo');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/uploads', $videoName, 'uploads');
        } else {
            $videoPath = null;
        }

        $shopId = SellerShop::where('user_id', auth()->id())->value('id');

        $product = Product::find($id);
        $product->user_id = auth()->id();
        $product->shop_id = $shopId;
        $product->name = $request->input('productName');
        $product->description = $request->input('productDescription');
        $product->specification = $request->input('productSpecification');
        $product->price = $request->input('productPrice');
        $product->discountedPrice = $request->input('productDiscountPrice');
        $product->category_id = $request->input('productCategory');
        $product->SubCategory_id = $request->input('productSubCategory');
        $product->Brand_id = $request->input('productBrand');
        $product->quantity = $request->input('productQuantity');
        $product->sku = $request->input('productSKU');
        $product->remote_image_url = $request->input('productImageURL');
        $product->remote_media1_url = $request->input('media11mageURL');
        $product->remote_media2_url = $request->input('media12mageURL');
        $product->remote_media3_url = $request->input('media13mageURL');
        $product->remote_video_url = $request->input('productVideoURL');
        $product->image_url = $imagePath;
        $product->media1_url = $media1Path;
        $product->media2_url = $media2Path;
        $product->media3_url = $media3Path;

        $product->video_url = $videoPath;

        $product->save();

        $productId = $product->id;

        $productId = $product->id;

        foreach ($request->input('attributeValues', []) as $attributeId => $attributeValue) {
            if ($attributeValue !== null && isset($attributeValue['value'])) {
                $values = explode(',', $attributeValue['value']);

                foreach ($values as $value) {
                    $attributeValueModel = new AttributeValue();
                    $attributeValueModel->product_id = $productId;
                    $attributeValueModel->product_attribute_id = $attributeId;
                    $attributeValueModel->value = $value;
                    $attributeValueModel->save();
                }
            }
        }

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $products = Product::where('shop_id', $shopId)->get();

        $shopId = SellerShop::where('user_id', Auth::id())->value('id');
        $categories = Category::where('seller_shop_id', $shopId)->get();

        return redirect()->back()->with('success', 'Product edited successfully!');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('editProductName');
        $product->description = $request->input('editProductDescription');
        $product->price = $request->input('editProductPrice');
        $product->discountedPrice = $request->input('editProductDiscountedPrice');
        $product->quantity = $request->input('editProductQuantity');
        $product->sku = $request->input('editProductSKU');
        
        if ($request->hasFile('editBrandImage')) {
            $image = $request->file('editBrandImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $brand->image_url = $imageName;
        }
        $product->save();



        return redirect()->route('productview')->with('update_success', 'Product updated successfully.');
    }

    public function cart()
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

        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('cart', compact('cart', 'categories', 'unseenmessages', 'brands', 'totalPrice', 'totalItems'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->where('product_id', $id)->first();

        $quantity = $request->input('quantity') ?? 1;
        $color = $request->input('color');
        $size = $request->input('size');

        if ($cart) {
            $cart->increment('quantity');
        } else {
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->product_id = $id;
            $cart->quantity = $quantity;
            $cart->color = $color;
            $cart->size = $size;
            $cart->save();
        }

        if ($product->quantity > 0) {
            $product->decrement('quantity', $quantity);
        }

        return redirect()->route('home')->with('success', 'Product added to cart successfully!');
    }

    public function remove($id)
    {
        $cartItem = Cart::find($id);
        if (!$cartItem) {
            abort(404);
        }

        $product = Product::find($cartItem->product_id);
        if ($product) {
            $product->increment('quantity', $cartItem->quantity);
        }

        $cartItem->delete();

        return redirect()->back();
    }

    public function productAttributes()
    {
        $shopInfo = SellerShop::where('user_id', auth()->id())->first();

        $productAttributes = ProductAttribute::all();
        $unseenmessages = DB::table('ch_messages')->where('to_id', '=', auth()->id())->where('seen', '=', '0')->count();


        return view('productAttributes', compact('productAttributes', 'unseenmessages', 'shopInfo'));
    }

    public function storeAttribute(Request $request)
    {
        $validateData = $request->validate([
            'attributeName' => 'required',
        ]);

        $attributes = new ProductAttribute();
        $attributes->name = $request->input('attributeName');
        $attributes->save();

        return redirect()->back()->with('success', 'Attribute Added Successfully!');
    }

    public function edit(Request $request, $id)
    {
        $attribute = ProductAttribute::findOrFail($id);

        $attribute->name = $request->input('editCategoryName');

        $attribute->save();

        return redirect()->back()->with('update_success', 'Attribute updated successfully.');
    }

    public function storeProductsFile(Request $request)
    {
        $userId = Auth::id();
        $shopId = SellerShop::where('user_id', auth()->id())->value('id');
        $categoryid = 2;

        Excel::import(new products($userId, $shopId, $categoryid), $request->file('productFile'));

        return redirect()->back()->with('success', 'All good!');
    }

    public function toggleProductState(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'product not found.');
        }

        $product->state = $request->input('state');
        $product->save();

        return redirect()->back()->with('state_success', 'product state toggled successfully.');
    }

    public function activateAllProducts()
    {
        Product::query()->update(['state' => 1]);

        return redirect()->back()->with('activate_success', 'All products activated successfully.');
    }

    public function deactivateAllProducts()
    {
        Product::query()->update(['state' => 0]);

        return redirect()->back()->with('deactivate_success', 'All products deactivated successfully.');
    }
}
