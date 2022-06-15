<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiUpload extends Controller
{
    public function upload(Request $request) {
        
        $data = $request->file('file');
        $fileName = $request->file('file')->getClientOriginalName();

        $path = public_path('/uploads/' . $request->object. '/'. $request->id);
        $data->move($path, $fileName);
    }
}
