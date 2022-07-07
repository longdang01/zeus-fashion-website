<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $discount = new Discount();
        $discount->color_id = $request->color_id;
        $discount->discount_name = $request->discount_name;
        $discount->value = $request->value;
        $discount->symbol = $request->symbol;
        $discount->is_active = $request->is_active;
        
        $discount->save();
        return $this->show($discount->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Discount::findOrFail($id);
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
        $discount = $this->show($request->id);
        $discount->color_id = $request->color_id;
        $discount->discount_name = $request->discount_name;
        $discount->value = $request->value;
        $discount->symbol = $request->symbol;
        $discount->is_active = $request->is_active;
        
        $discount->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = $this->show($id);
        $discount->is_active = -1;
        $discount->save();
    }
}
