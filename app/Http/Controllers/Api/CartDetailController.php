<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [CartDetail::with('product')->with('color')->with('size')
        ->where('is_active', '!=', -1)];
    }

    public function getCartDetail($request, $cart) {
        return CartDetail::with('product', 'product.colors', 'product.colors.sizes')
        ->with('color', 'color.sizes')->with('size')
        ->where([
            ['product_id', '=', $request->product_id],
            ['color_id', '=', $request->color_id],
            ['size_id', '=', $request->size_id],
            ['cart_id', '=', $cart->id],
            ['is_active', '<>', -1]
        ])->first();
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
        $cart = Cart::where('customer_id', $request->customer_id)->first();

        if(!$cart) {
            $cart = new Cart();
            $cart->customer_id = $request->customer_id;
            $cart->is_active = 1;
            $cart->save();
        } 

        $cartDetail = $this->getCartDetail($request, $cart);
        if($cartDetail) $request->quantity += $cartDetail->quantity; 
        else $cartDetail = new CartDetail();
        
        $cartDetail->cart_id = $cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->color_id = $request->color_id;
        $cartDetail->size_id = $request->size_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->is_active = 0;

        $cartDetail->save();
        return $this->show($cartDetail->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CartDetail::with('product', 'product.colors', 'product.colors.sizes', 'product.colors.sale', 'product.colors.price', 'product.colors.images')
        ->with('color', 'color.sizes', 'color.images', 'color.price', 'color.sale')->with('size')
        ->where([
            ['is_active', '<>', -1],
            ['id', '=', $id]
        ])->first();
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
        $cartDetail = $this->show($request->id);
        $cartDetail->cart_id = $request->cart_id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->color_id = $request->color_id;
        $cartDetail->size_id = $request->size_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->is_active = $request->is_active;
        
        $cartDetail->save();

        return $cartDetail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartDetail = $this->show($id);
        $cartDetail->is_active = -1;
        
        $cartDetail->save();
    }
}
