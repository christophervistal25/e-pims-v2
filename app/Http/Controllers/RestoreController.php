<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RestoreController extends Controller
{
    public function index()
    {
        $tablesUseSoftDelete = [
            'step_increments',
            'service_records',
            'salary_adjustments',
            'offices',
            'plantilla_positions',
            'positions',
        ];

        $deletedData = collect([]);
        foreach ($tablesUseSoftDelete as $table) {
            $query = DB::table($table)->where('deleted_at', '!=', null);
            // Check if there's a record
            if ($query->count() !== 0) {
                $deletedData[$table] = $query->get()->toArray();
            }
        }

        return view('restore.data.index', compact('deletedData'));
    }
}
