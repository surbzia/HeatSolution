<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\{ServiceController,CategoryController, RoleController, PermissionController, ProductController, UserController, CouponController, FaqController, InquiryController, NewsletterController, OrderController, ProductSaleTypeController};
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Public\ProductController as ProductFrontController;
use App\Http\Controllers\Public\OrderController as OrderFrontController;
use App\Http\Controllers\Public\CartController as CartFrontController;
use App\Http\Controllers\Public\InquiryController as InquiryFrontController;


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

Route::get('/front/all-products', [ProductFrontController::class, 'all']);
Route::get('/front/all-categories', [ProductFrontController::class, 'allCategories']);
Route::post('/front/inquiry', [InquiryFrontController::class, 'index']);

Route::post('/front/cart', [CartFrontController::class, 'index']);
Route::get('/front/cart/{cart}', [CartFrontController::class, 'get']);
Route::post('/front/cart/{cart}', [CartFrontController::class, 'item']);
Route::post('/front/cart/qty_upd/{cart}', [CartFrontController::class, 'update_quantity']);
Route::get('/front/cart/delete/{cart}', [CartFrontController::class, 'deleteCartItem']);

Route::get('/front/products', [ProductFrontController::class, 'index']);
Route::post('/front/products-viaslug', [ProductFrontController::class, 'getViaSlug']);
Route::get('/front/category/{category}', [ProductFrontController::class, 'category']);
Route::get('/front/categories', [ProductFrontController::class, 'categories']);
Route::get('/front/products/{slug}', [ProductFrontController::class, 'get']);

Route::post('/front/orders', [OrderFrontController::class, 'store'])->name('orders.api.store');
Route::post('/front/orders-wcart', [OrderFrontController::class, 'storewcart']);
Route::get('/front/orders/{order}', [OrderFrontController::class, 'index'])->name('orders.api.get');
Route::get('/front/user/orders', [OrderFrontController::class, 'getUserOrders'])->middleware('auth:api');
Route::put('/front/updateprofile', [ApiAuthController::class, 'updateprofile']);
Route::post('/front/newsletter', [NewsletterController::class, 'store']);

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api');
});

Route::group(['middleware' => ['cors', 'json.response', 'auth:api']], function () {
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
    Route::put('/updateprofile', [ApiAuthController::class, 'updateprofile']);

    /*Company resource*/
    // Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('file', FileController::class)->only([
        'store', 'destroy', 'index'
    ]);
    Route::post('/file/{table}/{id}/{type}', [FileController::class, 'findByTable']);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('user', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('product-sale-type', ProductSaleTypeController::class);
    Route::apiResource('coupons', CouponController::class);
    Route::apiResource('faqs', FaqController::class);
    Route::apiResource('inquiries', InquiryController::class);
    Route::apiResource('categories', CategoryController::class);
     Route::apiResource('services', ServiceController::class);
    Route::apiResource('orders', OrderController::class);
});
Route::middleware('auth:api')->get('/me', function (Request $request) {
    $notificationsCount = $request->user()->unreadNotifications()->count();
    $user = $request->user();
    $user->notification_count = $notificationsCount;
    return $user;
});
Route::middleware('auth:api')->get('/notifications', function (Request $request) {
    $notifications = $request->user()->notifications()->paginate(50);
    $request->user()->notifications()->paginate(50)->markAsRead();
    return $notifications;
});
