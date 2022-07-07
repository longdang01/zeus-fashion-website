<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdersStatus;
use DateTime;
use Illuminate\Http\Request;

class OrdersStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [OrdersStatus::with('orders')->where('is_active', 1)->get()];
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
        $ordersStatus = new OrdersStatus();
        $ordersStatus->orders_id = $request->orders_id;
        $ordersStatus->orders_status_name = $request->orders_status_name;
        // $ordersStatus->date = $request->date;
        $ordersStatus->date = date('Y-m-d H:i:s', strtotime($request->date));;
        $ordersStatus->is_active = 1;

        $ordersStatus->save();
        return $this->show($ordersStatus->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OrdersStatus::with('orders')->findOrFail($id);
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
        $ordersStatus = $this->show($request->id);
        $ordersStatus->orders_id = $request->orders_id;
        $ordersStatus->orders_status_name = $request->orders_status_name;
        $ordersStatus->date = $request->date;
        $ordersStatus->is_active = 1;

        $ordersStatus->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordersStatus = $this->show($id);
        $ordersStatus->is_active = -1;

        $ordersStatus->save();
    }
}
