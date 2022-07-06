<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    public $table = 'Employee_Add_Compensation';
    use HasFactory;

    public function description()
    {
        return $this->hasOne(CompensationCode::class, 'comCode', 'compensation_code');
    }
}
