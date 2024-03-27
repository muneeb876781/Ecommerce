<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerShopController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OredrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('indexPage');
})->name('blog');

Route::get('/contact', function () {
    return view('indexPage');
})->name('contact');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/single/{id}', [ShopController::class, 'singleProduct'])->name('singleProduct');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SellerController::class, 'index'])
        ->name('dashboard')
        ->middleware('seller');
    Route::get('/sellerShop', [SellerController::class, 'sellerShop'])->name('sellerShop');
    Route::delete('/deleteStore/{id}', [SellerShopController::class, 'delete'])->name('deleteStore');

    Route::get('/products', [ProductController::class, 'index'])
        ->name('productview')
        ->middleware('seller');
    Route::get('/addProducts', [ProductController::class, 'add'])
        ->name('addproduct')
        ->middleware('seller');
    Route::post('/storeProducts', [ProductController::class, 'store'])
        ->name('storeproduct')
        ->middleware('seller');
    Route::post('/products/{id}', [ProductController::class, 'destroy'])
        ->name('productdestroy')
        ->middleware('seller');
    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('productupdate')
        ->middleware('seller');

    Route::post('/products/reviews/{id}', [ReviewController::class, 'store'])->name('productreviewstore');
    Route::get('/reviews', [SellerController::class, 'reviews'])
        ->name('reviews')
        ->middleware('seller');

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categoryview')
        ->middleware('seller');
    Route::get('/addCategories', [CategoryController::class, 'add'])
        ->name('addcategory')
        ->middleware('seller');
    Route::post('/storeCategories', [CategoryController::class, 'store'])
        ->name('storeCategories')
        ->middleware('seller');
    Route::post('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('categorydestroy')
        ->middleware('seller');
    Route::put('/categories/{id}', [CategoryController::class, 'edit'])
        ->name('categoriesedit')
        ->middleware('seller');

    Route::get('/shop/category/{id}', [ShopController::class, 'showProductsByCategory'])->name('shopcategory');

    Route::get('/subCategories', [SubCategoryController::class, 'index'])
        ->name('subCategoryview')
        ->middleware('seller');
    Route::get('/addsubCategories', [SubCategoryController::class, 'add'])
        ->name('addsubCategory')
        ->middleware('seller');
    Route::post('/storesubCategories', [SubCategoryController::class, 'store'])
        ->name('storesubCategories')
        ->middleware('seller');
    Route::post('/subCategories/{id}', [SubCategoryController::class, 'destroy'])
        ->name('subCategorydestroy')
        ->middleware('seller');
    Route::put('/subCategories/{id}', [SubCategoryController::class, 'edit'])
        ->name('subCategoriesedit')
        ->middleware('seller');

    Route::post('/storesellershop', [SellerShopController::class, 'createShop'])->name('storesellershop');

    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::post('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::get('/addtoCart/{id}', [ProductController::class, 'addToCart'])->name('addtoCart');

    Route::post('/cart/{id}', [ProductController::class, 'remove'])->name('remove');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/order', [OredrController::class, 'placeOrder'])->name('order');
    Route::post('/udateOrderStatus/{id}', [OredrController::class, 'udateOrderStatus'])->name('udateOrderStatus');
    Route::get('/Order', [OredrController::class, 'index'])->name('Order');
    Route::get('/orderDetails/{id}', [OredrController::class, 'orderDetails'])->name('orderDetails');
    Route::delete('/orderDetails/{id}', [OredrController::class, 'delete'])->name('deleteOrder');


    Route::post('/cardOrder', [OredrController::class, 'cardOrder'])->name('cardOrder');


    

    Route::get('/trackOrders/{id}', [OredrController::class, 'trackOrders'])->name('trackOrders');
    Route::get('/userOrders', [OredrController::class, 'userOrders'])->name('userOrders');

    Route::get('/serachProducts', [ShopController::class, 'searchProducts'])->name('searchProducts');

    Route::get('/pAttributes', [ProductController::class, 'productAttributes'])->name('productAttributes');
    Route::post('/storeAttribute', [ProductController::class, 'storeAttribute'])->name('storeAttribute');
    Route::put('/pAttributes/{id}', [ProductController::class, 'edit'])
        ->name('attributesEdit')
        ->middleware('seller');

    Route::get('/order/{id}/downloadPDF', [OredrController::class, 'downloadPDF'])->name('downloadPDF');
});
