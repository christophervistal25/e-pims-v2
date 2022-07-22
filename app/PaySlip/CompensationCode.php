<?php

namespace App\Payslip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompensationCode extends Model
{
    use HasFactory;

    public $table = 'Compensation';

    public function account_chart()
    {
        return $this->hasOne(AccountChart::class, 'accountCode', 'accountCode');
    }
}
