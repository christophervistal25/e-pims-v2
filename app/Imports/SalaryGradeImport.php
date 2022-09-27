<?php

namespace App\Imports;

use App\SalaryGrade;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

// class SalaryGradeImport implements ToModel, WithHeadingRow
class SalaryGradeImport implements ToCollection
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            SalaryGrade::updateOrCreate([
                'sg_no' => $row[0],
                'sg_year' => $row[9],
            ], [
                'sg_no' => $row[0],
                'sg_step1' => $row[1],
                'sg_step2' => $row[2],
                'sg_step3' => $row[3],
                'sg_step4' => $row[4],
                'sg_step5' => $row[5],
                'sg_step6' => $row[6],
                'sg_step7' => $row[7],
                'sg_step8' => $row[8],
                'sg_year' => $row[9],
            ]);
        }
    }
}
