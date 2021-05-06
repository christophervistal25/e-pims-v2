<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefStatus;
use Illuminate\Support\Facades\Cache;

class ReferenceStatusController extends Controller
{

    public function status()
    {
       return Cache::rememberForever('status', function () {
            return RefStatus::orderBy('status_name')->get(['id', 'stat_code', 'status_name']);
        });
    }


    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'status_name' => 'required|unique:ref_statuses|regex:/^[a-zA-Z ].+$/u',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = RefStatus::create([
            'status_name' => $request->status_name,
        ]);

        return $status;
    }
}
