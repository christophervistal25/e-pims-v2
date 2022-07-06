<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionCode extends Model
{
    public $table = 'Deduction';
    use HasFactory;

    public function account_chart()
    {
        return $this->hasOne(AccountChart::class, 'accountCode', 'accountCode');
    }
}
