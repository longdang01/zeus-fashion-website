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

//Administration
// Route::get('/', function () { return view('admin.dashboards.index'); });
Route::get('/admin/dashboards', function () { return view('admin.dashboards.index'); });
Route::get('/admin/products', function () { return view('admin.products.index'); });
Route::get('/admin/categories', function () { return view('admin.categories.index'); });
Route::get('/admin/brands', function () { return view('admin.brands.index'); });
Route::get('/admin/suppliers', function () { return view('admin.suppliers.index'); });
Route::get('/admin/payments', function () { return view('admin.payments.index'); });
Route::get('/admin/transports', function () { return view('admin.transports.index'); });
Route::get('/admin/roles', function () { return view('admin.roles.index'); });
Route::get('/admin/orders', function () { return view('admin.orders.index'); });
Route::get('/admin/staffs', function () { return view('admin.staffs.index'); });
Route::get('/admin/login', function () { return view('admin.login.index'); });
Route::get('/admin/news', function () { return view('admin.news.index'); });


//Client
Route::get('/', function () { return view('client.home.index'); });
Route::get('/products', function () { return view('client.products.index'); });
Route::get('/details', function () { return view('client.details.index'); });
Route::get('/carts', function () { return view('client.carts.index'); });

Route::get('/products?category={category}&subCategory={subCategory}&keyword={keyword}', function ($category, $subCategory, $keyword)
{ 
    return [view('client.products.index'),
    'category' => $category,
    'subCategory' => $subCategory,
    'keyword' => $keyword
    ];
});

Route::get('/details?name={name}&id={id}', function($name, $id) {
    return [view('client.details.index'),
    'name' => $name,
    'id' => $id,
    ];
});
Route::get('/login', function () { return view('client.customers.login'); });
Route::get('/register', function () { return view('client.customers.register'); });

