<?php

namespace App\Http\Controllers\Api;

use App\RefNameExtension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ReferenceNameExtensionController extends Controller
{
    /**
     * Return list of all name extensions.
     */
    public function index()
    {
        return RefNameExtension::get()
                                ->pluck('extension')
                                ->toArray();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'extension' => ['required', 'unique:ref_name_extensions,extension','regex:/^[a-zA-Z]+$/u'],
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 422);
        }

        $record = RefNameExtension::create(['extension' => $request->extension]);

        return response()->json($record, 201);
    }

}
