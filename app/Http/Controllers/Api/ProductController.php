<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Product::with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->where('is_active', 1)
        ->orderBy('id', 'desc')
        ->get(), 
        'categories' => Category::with('subCategories')->where('is_active', 1)->get(),
        'brands' => Brand::where('is_active', 1)->get(),
        'suppliers' => Supplier::where('is_active', 1)->get()];
    }

    public function getProducts(Request $request)
    {
        $products = Product::with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->where('is_active', 1)
        ->orderBy('id', 'desc');

        if($request->product_name) { 
            $products = $products->where
            ('product_name', 'LIKE', "%$request->product_name%");
        }

        if($request->sub_category_id) { 
            $products = $products->where
            ('sub_category_id', '=', $request->sub_category_id);
        }

        if($request->category_id) {
            $products = $products->whereHas
            ('subCategory', function($query) use($request) {
                return $query->where('category_id', $request->category_id);
            });
        }

        return [$products->get(), 
        'categories' => Category::with('subCategories')->where('is_active', 1)->get(),
        'brands' => Brand::where('is_active', 1)->get(),
        'suppliers' => Supplier::where('is_active', 1)->get()
        ];
    }

    public function getNew()
    {
        $products = Product::with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->where('is_active', 1)->orderBy('created_at', 'desc')->take(8)->get();
        return $products;
    }

    public function getBestSeller()
    {
        $products = Product::
        join('orders_detail', 'orders_detail.product_id', '=', 'product.id')
        ->selectRaw('product.id, product.sub_category_id, product.brand_id,
        product.supplier_id, product.product_name, SUM(orders_detail.quantity) AS quantity_sold')
        ->where('orders_detail.is_active', 1)
        ->groupBy('product.id', 'product.sub_category_id', 'product.brand_id',
        'product.supplier_id', 'product.product_name') 
        ->orderByDesc('quantity_sold')
        ->with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->where('product.is_active', 1)
        ->take(8)->get();

        return $products;
    }

    public function getSale()
    {
        $products = Product::with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->where('is_active', 1)->take(8)->get()->toArray();

        $filteredArray = Arr::where($products, function ($value, $key) {
            $colors = $value['colors'];
            foreach($colors as $item) {
                return $item['sale'] != null;
            }
        });
        return $filteredArray;
        // return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->sub_category_id = $request->sub_category_id;
        $product->supplier_id = $request->supplier_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->origin = $request->origin;
        $product->material = $request->material;
        $product->style = $request->style;
        $product->size_table = $request->size_table;
        $product->description = $request->description;
        $product->is_active = 1;
        
        $product->save();
        return $this->show($product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::with('subCategory')->with('supplier')->with('brand')
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts',
        'colors.sale', 'colors.codes')
        ->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->show($request->id);

        $product->sub_category_id = $request->sub_category_id;
        $product->supplier_id = $request->supplier_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->origin = $request->origin;
        $product->material = $request->material;
        $product->style = $request->style;
        $product->size_table = $request->size_table;
        $product->description = $request->description;
        $product->is_active = 1;
        
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->show($id);
        $product->is_active = -1;
        $product->save();
    }
}
