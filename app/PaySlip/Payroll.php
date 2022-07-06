<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $table = 'Payroll';
    use HasFactory;

    public function details()
    {
        return $this->hasMany(PayrollDetails::class, 'payroll_no', 'payroll_no');
    }

    public function compensations()
    {
        return $this->hasMany(Compensation::class, 'payroll_no', 'payroll_no');
    }

    public function mandatory_deductions()
    {
        return $this->hasMany(Deduction::class, 'payroll_no', 'payroll_no')->where('type', 'M');
    }

    public function personal_deductions()
    {
        return $this->hasMany(Deduction::class, 'payroll_no', 'payroll_no')->where('type', 'P');
    }
}
