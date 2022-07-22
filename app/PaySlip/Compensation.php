<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    use HasFactory;

    public $table = 'Employee_Add_Compensation';

    public function description()
    {
        return $this->hasOne(CompensationCode::class, 'comCode', 'compensation_code');
    }
}
