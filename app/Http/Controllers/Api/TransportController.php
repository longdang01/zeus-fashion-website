<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Transport::where('is_active', 1)->get()];
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
        $transport = new Transport();
        $transport->transport_type = $request->transport_type;
        $transport->fee = $request->fee;
        $transport->description = $request->description;
        $transport->is_active = 1;

        $transport->save();
        return $this->show($transport->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Transport::findOrFail($id);
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
        $transport = $this->show($request->id);
        $transport->transport_type = $request->transport_type;
        $transport->fee = $request->fee;
        $transport->description = $request->description;
        $transport->is_active = 1;

        $transport->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = $this->show($id);
        $transport->is_active = -1;

        $transport->save();
    }
}
