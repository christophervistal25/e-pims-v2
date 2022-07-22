<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetails extends Model
{
    use HasFactory;

    public $table = 'Payroll_Details';

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_no', 'payroll_no');
    }
}
