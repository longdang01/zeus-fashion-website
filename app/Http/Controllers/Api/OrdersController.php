<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\OrdersStatus;
use App\Models\Price;
use App\Models\Size;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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

    public function getOrders($customer_id) {
        return Orders::with('ordersDetails', 'ordersDetails.product', 'ordersDetails.color', 'ordersDetails.color.images', 'ordersDetails.size')
        ->with('ordersStatus')
        ->with('payment')->with('transport')->with('customer')->with('deliveryAddress')
        ->where([
            ['is_active', 1],
            ['customer_id', $customer_id]
        ])->get();
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
        $orders = new Orders();
        $orders->payment_id= $request->payment_id;
        $orders->transport_id = $request->transport_id;
        $orders->customer_id = $request->customer_id;
        $orders->delivery_address_id = $request->delivery_address_id;
        $orders->order_date = Carbon::parse(Carbon::now())->format('Y-m-d');
        $orders->note = $request->note;
        $orders->total = $request->total;
        $orders->status = 0;
        $orders->is_active = 1;

        $orders->save();

        $cartDetails = $request->cartDetails;
        
        foreach((array)$cartDetails as $item) {
            $ordersDetail = new OrdersDetail();
            $price = new Price();
            $size = new Size();

            $ordersDetail->orders_id= $orders->id;
            $ordersDetail->product_id = $item['product_id'];
            $ordersDetail->color_id = $item['color_id'];
            $ordersDetail->size_id = $item['size_id'];
            $ordersDetail->quantity = $item['quantity'];
            $ordersDetail->price = $price->getPrice($item['color']);
            $ordersDetail->is_active = 1;
            
            //update size
            $size->updateSize($item, 1);

            $ordersDetail->save();
        }

        //remove cart after order
        DB::table('cart_detail')->where(
        [
            ['cart_id', $cartDetails[0]['cart_id']],
            ['is_active', 1]
        ])->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Orders::with('ordersDetails', 'ordersDetails.product', 'ordersDetails.color', 'ordersDetails.color.images', 'ordersDetails.size')
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
        $orders->is_active = 1;
    
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
        $orders = $this->show($id); 

        foreach($orders->ordersDetails as $item) {
            $size = new Size();
            $size->updateSize($item, 2);
        }
        
        $orders->status = 4;
        $orders->save();
        return $this->show($orders->id);
        // DB::table("orders_detail")->where("orders_id", $id)->delete();
    }

    public function revert($id)
    {
        $orders = $this->show($id); 

        foreach($orders->ordersDetails as $item) {
            $size = new Size();
            $size->updateSize($item, 1);
        }
        
        $orders->order_date = Carbon::parse(Carbon::now())->format('Y-m-d');
        $orders->status = 0;
        $orders->save();
        return $this->show($orders->id);
        // DB::table("orders_detail")->where("orders_id", $id)->delete();
    }
}
