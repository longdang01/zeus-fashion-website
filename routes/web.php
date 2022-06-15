<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('admin.dashboards.index'); });
Route::get('/admin/dashboards', function () { return view('admin.dashboards.index'); });
Route::get('/admin/products', function () { return view('admin.products.index'); });
Route::get('/admin/categories', function () { return view('admin.categories.index'); });
Route::get('/admin/suppliers', function () { return view('admin.suppliers.index'); });
