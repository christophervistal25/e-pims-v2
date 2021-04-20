<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefStatus;

class ReferenceStatusController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'stat_code' => 'required|unique:ref_statuses',
            'status_name' => 'required',
        ], [], ['stat_code' => 'status code']);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = RefStatus::create([
            'stat_code'   => $request->stat_code,
            'status_name' => $request->status_name,
        ]);

        return $status;
    }
}
