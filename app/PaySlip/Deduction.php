<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    public $table = 'Employee_Deductions';

    public function description()
    {
        return $this->hasOne(DeductionCode::class, 'dCode', 'deduction_code');
    }
}
