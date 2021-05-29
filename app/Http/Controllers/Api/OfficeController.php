<?php

namespace App\Http\Controllers\Api;

use App\Office;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class OfficeController extends Controller
{

    public function searchOfficeHead(string $key)
    {
        return Employee::where('firstname', 'like', "%" . $key . "%")
                        ->orWhere('middlename', 'like', "%" . $key . "%")
                        ->orWhere('lastname', 'like', "%" . $key . "%")
                        ->orWhere('extension', 'like', "%" . $key . "%")
                        ->get(['firstname', 'middlename', 'lastname', 'extension']);
        
    }

    public function search(string $key)
    {
        return Office::where('office_name', 'like',  '%' . $key . '%')->get();
    }

    public function list()
    {
        return Office::get(['office_code', 'office_name','office_short_name']);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all() , [
            'name'          => 'required',
            'short_name'    => 'required',
            'address'       => 'required',
            'head'          => 'required|unique:offices,office_head',
            'short_address' => 'required',
            'position_name' => 'required|exists:positions'
        ], ['head.unique' => 'The office head is already belongs to an office.'], ['head' => 'office head']);

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
