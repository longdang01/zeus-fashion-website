<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Cart::with('cartDetails', 'cartDetails.product',
        'cartDetails.product.colors',
        'cartDetails.product.colors.sizes', 'cartDetails.product.colors.images',
        'cartDetails.product.colors.discounts', 'cartDetails.product.colors.price',
        'cartDetails.product.colors.sale', 'cartDetails.product.colors.codes',
        'cartDetails.color', 'cartDetails.size')
        ->where('is_active', 1)];
    }

    public function getCarts($customer_id) {
        return Cart::with('cartDetails', 'cartDetails.product',
        'cartDetails.product.colors',
        'cartDetails.product.colors.sizes', 'cartDetails.product.colors.images',
        'cartDetails.product.colors.discounts', 'cartDetails.product.colors.price',
        'cartDetails.product.colors.sale', 'cartDetails.product.colors.codes',
        'cartDetails.color', 'cartDetails.size')
        ->where('customer_id', $customer_id)->first();
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
        $cart = new Cart();
        $cart->customer_id = $request->customer_id;
        $cart->is_active = 1;
        $cart->save();

        return $this->show($cart->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Cart::with('cartDetails', 'cartDetails.product',
        // 'cartDetails.color', 'cartDetails.size')->findOrFail($id);

        return Cart::with('cartDetails', 'cartDetails.product', 'cartDetails.product.colors',
        'cartDetails.product.colors.sizes', 'cartDetails.product.colors.images',
        'cartDetails.product.colors.discounts', 'cartDetails.product.colors.price',
        'cartDetails.product.colors.sale', 'cartDetails.product.colors.codes',
        'cartDetails.color', 'cartDetails.size')->findOrFail($id);
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
        $cart = $this->show($request->id);
        $cart->customer_id = $request->customer_id;
        $cart->is_active = 1;
        $cart->save();

        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = $this->show($id);
        $cart->is_active = -1;
        $cart->save();
    }
}
