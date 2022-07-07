<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Orders::with('ordersDetails', 'ordersDetails.product', 'ordersDetails.color', 'ordersDetails.size')
        ->with('ordersStatus')
        ->with('payment')->with('transport')->with('customer')->with('deliveryAddress')
        ->where('is_active', 1)
        ->get()];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Orders::with('ordersDetails', 'ordersDetails.product', 'ordersDetails.color', 'ordersDetails.size')
        ->with('ordersStatus')
        ->with('payment')->with('transport')->with('customer')->with('deliveryAddress')
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
        $orders = $this->show($request->id);
        $orders->payment_id = $request->payment_id;
        $orders->transport_id = $request->transport_id;
        $orders->customer_id = $request->customer_id;
        $orders->delivery_address_id = $request->delivery_address_id;
        $orders->order_date = $request->order_date;
        $orders->note = $request->note;
        $orders->total = $request->total;
        $orders->status = $request->status;
    
        $orders->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
