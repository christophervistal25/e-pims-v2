<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Position;
use App\Services\PositionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct(public PositionService $positionService)
    {
    }

    public function lookup()
    {
        return Position::where('Description', 'like', '%'.request()->search.'%')->get();
    }

    public function search(string $key)
    {
        return Position::where('position_name', 'like', '%'.$key.'%')->get();
    }

    public function list(): Collection
    {
        return $this->positionService->get();
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:positions,position_name|regex:/^[a-zA-Z ].+$/u',
            'salary_grade' => 'required|numeric|between:1,33',
            'short_name' => 'required|unique:positions,position_short_name|regex:/^[a-zA-Z ].+$/u',
        ], ['name.unique' => 'The position already exists.']);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $position = Position::create([
            'position_name' => $request->name,
            'sg_no' => $request->salary_grade,
            'position_short_name' => $request->short_name,
        ]);

        return $position;
    }
}
