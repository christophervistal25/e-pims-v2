<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetails extends Model
{
    public $table = 'Payroll_Details';
    use HasFactory;

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_no', 'payroll_no');
    }

    
}
