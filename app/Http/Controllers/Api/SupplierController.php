<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Supplier::where('is_active', 1)->get()];
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
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->description = $request->description;
        $supplier->is_active = 1;

        $supplier->save();
        return $this->show($supplier->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Supplier::findOrFail($id);
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
        $supplier = $this->show($request->id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->description = $request->description;
        $supplier->is_active = 1;

        $supplier->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = $this->show($id);
        $supplier->is_active = -1;

        $supplier->save();
    }
}
