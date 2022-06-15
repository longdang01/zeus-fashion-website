<?php

use App\Http\Controllers\Api\apiUpload;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SizeController;
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
Route::resource('sizes', CategoryController::class);
Route::resource('categories', CategoryController::class);

Route::get('get-colors-by-product/{id}', [ColorController::class, 'getColorsByProduct']);
Route::get('get-sizes-by-color/{id}', [SizeController::class, 'getSizesByColor']);
Route::post('upload', [apiUpload::class, 'upload']);

