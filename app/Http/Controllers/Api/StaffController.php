<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Staff::with('users')->with('position', 'position.role')
        ->where('is_active', 1)->get(),
        'roles' => Role::with('positions')->where('is_active', 1)->get(),
        'positions' => Position::with('role')->where('is_active', 1)->get()
        ];
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
        $staff = new Staff();
        $staff->users_id = $request->users_id;
        $staff->position_id = $request->position_id;
        $staff->staff_name = $request->staff_name;
        $staff->picture = $request->picture;
        $staff->dob = $request->dob;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->is_active = 1;

        $staff->save();
        return $this->show($staff->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Staff::with('users')->with('position', 'position.role')
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
        $staff = $this->show($request->id);
        $staff->users_id = $request->users_id;
        $staff->position_id = $request->position_id;
        $staff->staff_name = $request->staff_name;
        $staff->picture = $request->picture;
        $staff->dob = $request->dob;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->is_active = 1;

        $staff->save();
        return $this->show($staff->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = $this->show($id);
        $staff->is_active = -1;

        $staff->save();
    }
}
