<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Users;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Customer::with('users')->with('deliveryAddress')->where('is_active', 1)
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
        $customer = new Customer();
        $customer->users_id = $request->users_id;
        $customer->customer_name = $request->customer_name;
        $customer->picture = $request->picture;
        $customer->dob = $request->dob;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->is_active = 1;

        $customer->save();
        return $this->show($customer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::with('users')->with('deliveryAddress')
        ->where([['is_active', 1], ['id', $id]])->first();
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
        $customer = $this->show($request->id);
        $customer->users_id = $request->users_id;
        $customer->customer_name = $request->customer_name;
        $customer->picture = $request->picture;
        $customer->dob = $request->dob;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->is_active = 1;

        $customer->save();
        return $this->show($customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->show($id);
        $customer->is_active = -1;

        $customer->save();
    }
}
