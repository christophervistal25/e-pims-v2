<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Office;
use Illuminate\Support\Facades\Cache;


class OfficeController extends Controller
{
    public function search(string $key)
    {
        return Office::where('office_name', 'like',  '%' . $key . '%')->get();
    }

    public function list()
    {
        return Cache::rememberForever('offices', function () {
            return Office::get(['office_code', 'office_name','office_short_name']);
        });
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all() , [
            'name'          => 'required',
            'short_name'    => 'required',
            'address'       => 'required',
            'head'          => 'required',
            'short_address' => 'required',
            'position_name' => 'required|exists:positions'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $office = Office::create([
            'office_name'          => $request->name,
            'office_short_name'    => $request->short_name,
            'office_address'       => $request->address,
            'office_short_address' => $request->short_address,
            'office_head'          => $request->head,
            'position_name'        => $request->position_name,
        ]);

        return $office;
    }
}
