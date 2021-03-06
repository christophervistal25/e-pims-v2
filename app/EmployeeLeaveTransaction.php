<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveTransaction extends Model
{
    use HasFactory;
    
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = ['id', 'transaction_id', 'transaction_type', 'record_type', 'trans_date', 'leave_amount'];

    public $timestamps = false;

    public function transactionable()
    {
        return $this->morphTo();
    }
}
