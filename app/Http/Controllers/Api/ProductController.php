<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts')
        ->where('is_active', '!=', -1)
        ->orderBy('id', 'desc')
        ->get(), 
        'categories' => Category::with('subCategories')->get(),
        'brands' => Brand::get(),
        'suppliers' => Supplier::get()];
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
        $product->is_active = $request->is_active;
        
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
        ->with('colors', 'colors.sizes', 'colors.images', 'colors.price', 'colors.discounts')
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
        $product->is_active = $request->is_active;
        
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
