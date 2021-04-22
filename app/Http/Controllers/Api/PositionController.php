<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\Cache;

class PositionController extends Controller
{

    public function search(string $key)
    {
        return Position::where('position_name', 'like',  '%' . $key . '%')->get();
    }

    public function list()
    {
        // return Cache::rememberForever('positions', function () {
            return Position::get();
        // });
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'         => 'required|unique:positions,position_name|regex:/^[a-zA-Z ].+$/u',
            'salary_grade' => 'required|numeric|between:1,33',
            'short_name'   => 'required|unique:positions,position_short_name|regex:/^[a-zA-Z ].+$/u',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $position = Position::create([
            'position_name'       => $request->name,
            'salary_grade'        => $request->salary_grade,
            'position_short_name' => $request->short_name,
        ]);

        return $position;
    }
}
