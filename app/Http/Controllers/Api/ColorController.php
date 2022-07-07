<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Color::with('price')->with('sizes')->with('images')->with('discounts')
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
        $color = new Color();
        $color->product_id = $request->product_id;
        $color->color_name = $request->color_name;
        $color->hex = $request->hex;
        $color->is_active = 1;

        $color->save();
        return $this->show($color->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Color::with('price')->with('sizes')->with('images')->with('discounts')
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
        $color = $this->show($request->id);
        $color->product_id = $request->product_id;
        $color->color_name = $request->color_name;
        $color->hex = $request->hex;
        $color->is_active = 1;

        $color->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = $this->show($id);
        $color->is_active = -1;
        $color->save();
    }
}
