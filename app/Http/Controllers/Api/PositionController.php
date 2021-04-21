<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\Cache;

class PositionController extends Controller
{
    public function list()
    {
        // return Cache::rememberForever('positions', function () {
            return Position::get();
        // });
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'code'         => 'required|numeric|unique:positions,position_code',
            'name'         => 'required',
            'salary_grade' => 'required|numeric|between:1,33',
            'short_name'   => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $position = Position::create([
            'position_code'       => $request->code,
            'position_name'       => $request->name,
            'salary_grade'        => $request->salary_grade,
            'position_short_name' => $request->short_name,
        ]);

        return $position;
    }
}
