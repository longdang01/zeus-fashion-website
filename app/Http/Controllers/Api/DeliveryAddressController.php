<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [DeliveryAddress::with('customer')->where('is_active', '!=', -1)->get()];
    }

    public function getDeliveryAddress($customer_id) {
        return Customer::with('deliveryAddress')
        ->where([
            ['id', '=', $customer_id],
            ['is_active', '<>', -1]
            ])->first();
    }

    public function checkActive($customer_id) {
        return DeliveryAddress::with('customer')
        ->where([
            ['customer_id', '=', $customer_id],
            ['is_active', '=', 1]
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
        $check = $this->checkActive($request->customer_id);

        $deliveryAddress = new DeliveryAddress();
        $deliveryAddress->customer_id = $request->customer_id;
        $deliveryAddress->delivery_address_name = $request->delivery_address_name;
        $deliveryAddress->consignee_name = $request->consignee_name;
        $deliveryAddress->consignee_phone = $request->consignee_phone;
        $deliveryAddress->is_active = ($check) ? 0 : 1;

        $deliveryAddress->save();

        return $this->show($deliveryAddress->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DeliveryAddress::with('customer')->findOrFail($id);
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
        $deliveryAddress = $this->show($request->id);
        $deliveryAddress->customer_id = $request->customer_id;
        $deliveryAddress->delivery_address_name = $request->delivery_address_name;
        $deliveryAddress->consignee_name = $request->consignee_name;
        $deliveryAddress->consignee_phone = $request->consignee_phone;
        $deliveryAddress->is_active = $request->is_active;

        $deliveryAddress->save();
        
        return $this->show($deliveryAddress->id);
    }

    public function setDeFault(Request $request, $id)
    {
        DB::table('delivery_address')->where('is_active', '=', 1)->update(array('is_active' => 0));
        // DeliveryAddress::query()->update(['is_active' => 0]);
        
        $deliveryAddress = $this->show($id);
        $deliveryAddress->is_active = 1;
        $deliveryAddress->save();

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliveryAddress = $this->show($id);
        $deliveryAddress->is_active = -1;

        $deliveryAddress->save();
    }
}
