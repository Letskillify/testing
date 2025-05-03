<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeOptionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\SearchedKeywordController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BillingDetailController;
use App\Http\Controllers\RevenueFromPurchaseAndSaleOfProductController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\UserPaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//  ========================
//  Admin Routes
//  ========================
Route::prefix('admin')->group(function () {
    //  Editors
    Route::apiResource('editors', App\Http\Controllers\EditorController::class);

    //  Attributes
    Route::apiResource('attributes', App\Http\Controllers\AttributeController::class);

    //  Attribute Options
    Route::apiResource('attribute-options', App\Http\Controllers\AttributeOptionController::class);

    //  Sections
    Route::apiResource('sections', App\Http\Controllers\SectionController::class);

    // Offers
    Route::apiResource('offers', App\Http\Controllers\OfferController::class);
});

// ========================
//  Frontend Routes
//  ========================
Route::prefix('front')->group(function () {
    // Categories
    Route::apiResource('categories', App\Http\Controllers\CategoryController::class);

    // Sub-Categories
    Route::apiResource('subcategories', App\Http\Controllers\SubCategoryController::class);

    // Brands
    Route::apiResource('brands', App\Http\Controllers\BrandController::class);

    // Products
    Route::apiResource('products', App\Http\Controllers\ProductController::class);

    // Carts
    Route::apiResource('carts', App\Http\Controllers\CartController::class);

    // Cart Items
    Route::apiResource('cart-items', App\Http\Controllers\CartItemController::class);

    // Coupons
    Route::apiResource('coupons', App\Http\Controllers\CouponController::class);

    // Shipping Methods
    Route::apiResource('shipping-methods', App\Http\Controllers\ShippingMethodController::class);

    // Orders
    Route::apiResource('orders', App\Http\Controllers\OrderController::class);

    // Order Items
    Route::apiResource('order-items', App\Http\Controllers\OrderItemController::class);

    // Payment Types
    Route::apiResource('payment-types', App\Http\Controllers\PaymentTypeController::class);

    // Reviews
    Route::apiResource('reviews', App\Http\Controllers\ReviewController::class);

    // Contact Us
    Route::post('contact-us', [App\Http\Controllers\ContactUsController::class, 'store']);

    // General Settings
    Route::get('general-settings', [App\Http\Controllers\GeneralSettingController::class, 'index']);

    // Searched Keywords
    Route::get('searched-keywords', [App\Http\Controllers\SearchedKeywordController::class, 'index']);

    // Tags
    Route::apiResource('tags', App\Http\Controllers\TagController::class);

    // Product Views
    Route::post('product-views/{product}', [App\Http\Controllers\ProductViewController::class, 'store']);

     // Product Attributes
    Route::get('product-attributes/{product}', [App\Http\Controllers\ProductAttributeController::class, 'index']);

    // Comments
    Route::apiResource('comments', App\Http\Controllers\CommentController::class);

    // Billing Details
    Route::apiResource('billing-details', App\Http\Controllers\BillingDetailController::class);

    // Revenue from Purchase and Sale of Products
    Route::get('revenue', [App\Http\Controllers\RevenueFromPurchaseAndSaleOfProductController::class, 'index']);

    // Comment Replies
    Route::apiResource('comment-replies', App\Http\Controllers\CommentReplyController::class);

    // User Payments
    Route::apiResource('user-payments', App\Http\Controllers\UserPaymentController::class);
});
