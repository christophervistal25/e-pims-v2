<?php

namespace App\Http\Controllers\Api;

use App\Plantilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SalaryAdjustmentPerOfficeController extends Controller
{
    public function plantillaWithAdjustment(string $office, string $year = null)
    {
        $data = Plantilla::whereHas('salary_adjustment', function ($query)  use($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'salary_adjustment' => function ($query) use($year) {
            $query->whereYear('date_adjustment', $year);
        }, 'office' => function ($query) use($office) {
            $query->where('office_code', $office);
        }])->where('year', $year)
        ->get();
        
    return DataTables::of($data)
        ->make(true);
    }

    public function plantillaWithoutAdjustment(string $office, string $year)
    {
        $data = Plantilla::whereDoesntHave('salary_adjustment', function ($query) use($year) {
            $query->whereYear('date_adjustment', $year);
        })->with(['Employee', 'plantilla_positions', 'plantilla_positions.position', 'salary_adjustment' => function ($query) use($year) {
            $query->whereYear('date_adjustment', $year);
        }, 'office' => function ($query) use($office) {
            $query->where('office_code', $office);
        }])->where('year', $year)
            ->get();

        return DataTables::of($data)
            ->editColumn('checkbox', function ($row) {
                // $checkbox = "<input id='checkbox{$row->plantilla->plantilla_id}' class='not-select-checkbox' style='transform:scale(1.35)' value='{$row->plantilla->plantilla_id}' type='checkbox' />";
                $checkbox = "<input id='checkbox{$row}' class='not-select-checkbox' style='transform:scale(1.35)' value='' type='checkbox' />";
                return $checkbox;
            })->rawColumns(['checkbox'])
            ->make(true);
    }
}
