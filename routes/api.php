<?php

use App\Http\Controllers\Api\apiUpload;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CartDetailController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\OrdersStatusController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class);
Route::resource('colors', ColorController::class);
Route::resource('prices', PriceController::class);
Route::resource('sizes', SizeController::class);
Route::resource('discounts', DiscountController::class);
Route::resource('images', ImageController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subCategories', SubCategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('payments', PaymentController::class);
Route::resource('transports', TransportController::class);
Route::resource('roles', RoleController::class);
Route::resource('positions', PositionController::class);
Route::resource('orders', OrdersController::class);
Route::resource('ordersStatus', OrdersStatusController::class);
Route::resource('staffs', StaffController::class);
Route::resource('users', UsersController::class);
Route::resource('news', NewsController::class);

//admin
Route::post('upload', [apiUpload::class, 'upload']);

//client
Route::resource('customers', CustomerController::class);
Route::resource('carts', CartController::class);
Route::resource('cartDetails', CartDetailController::class);


Route::get('product/get-products', [ProductController::class, 'getProducts']);
Route::get('cart/get-carts/{customerID}', [CartController::class, 'getCarts']);

// &
Route::post('login_check', [UsersController::class, 'checkLogin']);

