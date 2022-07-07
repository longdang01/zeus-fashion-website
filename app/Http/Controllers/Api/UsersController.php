<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //return users if exist username, password
    public function checkLogin(Request $request)
    {
        return Users::with('staff', 'staff.users', 'staff.position')
        ->with('customer', 'customer.users', 'customer.deliveryAddress')
        ->where([
            ['username', $request->username],
            ['password', $request->password],
            ['is_active', 1]
        ])->first();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [Users::where('is_active', 1)->get()];
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
        $users = new Users();
        $users->username = $request->username;
        $users->password = $request->password;
        $users->is_active = 1;

        $users->save();
        return $this->show($users->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return [Users::findOrFail($id)];
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
        $users = $this->show($request->id);
        $users->username = $request->username;
        $users->password = $request->password;
        $users->is_active = 1;

        $users->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->show($id);
        $users->is_active = -1;

        $users->save();
    }
}
