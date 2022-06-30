<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveIncrement extends Model
{

    protected $fillable = [
        'id',
        'leave_type_id',
        'Employee_id',
        'month',
    ];

    public $primaryKey = 'id';
    public $keyType = 'string';

    public $timestamps = false;
    
    protected $table = 'Leave_Increments';

    
    public function leave()
    {
        return $this->belongsTo(LeaveType::class, 'id', 'leave_type_id');
    }

    
    public function transaction()
    {
        return $this->morphOne(EmployeeLeaveTransaction::class, 'transactionable', 'transaction_type', 'transaction_id')->where('record_type', 'INCREMENT');
    }
}
