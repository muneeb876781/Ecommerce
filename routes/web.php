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
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\vendor\Chatify\MessagesController;

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
Route::get('/shop/category/{id}', [ShopController::class, 'showProductsByCategory'])->name('shopcategory');
Route::get('/shop/brand/{id}', [ShopController::class, 'showProductsByBrand'])->name('shopBrand');
Route::get('/shop/subcategory/{id}', [ShopController::class, 'showProductsBysubcategory'])->name('shopsubcategory');

Route::get('/shopss', [ShopController::class, 'showProducts'])->name('shopss');

Route::get('/switch-currency/{currency}', function ($currency) {
        Session::put('currency', $currency);
        return redirect()->back();
    })->name('switch-currency');

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
    Route::put('/toggleProductState/{id}', [ProductController::class, 'toggleProductState'])->name('toggleProductState');
    Route::put('/activateAllProducts', [ProductController::class, 'activateAllProducts'])->name('activateAllProducts');
    Route::put('/deactivateAllProducts', [ProductController::class, 'deactivateAllProducts'])->name('deactivateAllProducts');
    Route::get('/editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
    Route::post('/saveproductchanges/{id}', [ProductController::class, 'saveproductchanges'])->name('saveproductchanges');

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
    Route::put('/toggleCategoryState/{id}', [CategoryController::class, 'toggleCategoryState'])->name('toggleCategoryState');
    Route::put('/activateAllCategories', [CategoryController::class, 'activateAllCategories'])->name('activateAllCategories');
    Route::put('/deactivateAllCategories', [CategoryController::class, 'deactivateAllCategories'])->name('deactivateAllCategories');

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
    Route::get('/handleCheckout', [OrderController::class, 'handleCheckout'])->name('handleCheckout');
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

    Route::get('/venderProfile', [SellerController::class, 'venderProfile'])->name('venderProfile');
    Route::post('/editShop/{id}', [SellerShopController::class, 'editShop'])->name('editShop');

    Route::get('/brands', [BrandController::class, 'brands'])->name('brands');
    Route::post('/storeBrand', [BrandController::class, 'storeBrand'])
        ->name('storeBrand')
        ->middleware('seller');
    Route::put('/brands/{id}', [BrandController::class, 'edit'])
        ->name('brandsEdit')
        ->middleware('seller');
    Route::get('/brandsShop/{id}', [ShopController::class, 'showProductsByBrand'])->name('brandsShop');
    Route::put('/toggleBrandState/{id}', [BrandController::class, 'toggleState'])->name('toggleBrandState');
    Route::put('/activateAllBrands', [BrandController::class, 'activateAllBrands'])->name('activateAllBrands');
    Route::put('/deactivateAllBrands', [BrandController::class, 'deactivateAllBrands'])->name('deactivateAllBrands');

    Route::get('/finance', [OredrController::class, 'finance'])->name('finance');
    Route::get('/policies', [SellerController::class, 'policies'])->name('policies');
    Route::post('/storepolicy', [SellerController::class, 'storepolicy'])
        ->name('storepolicy')
        ->middleware('seller');
    Route::get('/shopPolicies/{id}', [ShopController::class, 'shopPolicies'])->name('shopPolicies');

    Route::get('/banners', [SellerController::class, 'banners'])->name('banners');
    Route::post('/storeBanner', [SellerController::class, 'storeBanner'])
        ->name('storeBanner')
        ->middleware('seller');
    Route::delete('/banners/{id}', [SellerController::class, 'destroyBanner'])->name('bannerDestroy');
    // Route::get('/saleBanners', [SellerController::class, 'saleBanners'])->name('saleBanners');
    Route::put('/toggleBannerState/{id}', [SellerController::class, 'toggleBannerState'])->name('toggleBannerState');
    Route::put('/deactivateAllBanners', [SellerController::class, 'deactivateAllBanners'])->name('deactivateAllBanners');
    Route::put('/activateAllBanners', [SellerController::class, 'activateAllBanners'])->name('activateAllBanners');

    Route::get('/templates', [SellerController::class, 'templates'])->name('templates');
    Route::post('/storeTemplates', [SellerController::class, 'storeTemplates'])->name('storeTemplates');
    Route::post('/activateTemplate/{id}', [SellerController::class, 'activateTemplate'])->name('activateTemplate');
    Route::put('/templates/{id}', [SellerController::class, 'edit'])
        ->name('templatesedit')
        ->middleware('seller');

    Route::get('/shop/price/{range}', [ShopController::class, 'filterProductsByPrice'])->name('filterProductsByPrice');
    Route::get('/shop/combined-filter', [ShopController::class, 'combinedFilter'])->name('combinedFilter');

    Route::get('/adminDashboard', [AdminController::class, 'index'])
        ->name('adminDashboard')
        ->middleware('admin');
    Route::get('/users', [AdminController::class, 'users'])
        ->name('users')
        ->middleware('admin');
    Route::put('/users/{id}', [AdminController::class, 'editUser'])
        ->name('editUser')
        ->middleware('admin');
    Route::post('/destroyUser/{id}', [AdminController::class, 'destroyUser'])
        ->name('destroyUser')
        ->middleware('admin');
    Route::get('/shops', [AdminController::class, 'shops'])
        ->name('shops')
        ->middleware('admin');
    Route::post('/destroyShop/{id}', [AdminController::class, 'destroyShop'])
        ->name('destroyShop')
        ->middleware('admin');
    Route::get('/adminProfile', [AdminController::class, 'adminProfile'])
        ->name('adminProfile')
        ->middleware('admin');
    Route::get('/admin/table/{tableName}', [AdminController::class, 'showTable'])
        ->name('admin.table')
        ->middleware('admin');

    
    Route::get('/chatify', [MessagesController::class, 'index'])->name('chatify');
    Route::get('/chatifyy/{id}', [MessagesController::class, 'index'])->name('chatifyy');
});
