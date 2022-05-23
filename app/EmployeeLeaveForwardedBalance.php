<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveForwardedBalance extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $connection = 'DTR_PAYROLL_CONNECTION';
    public $table = 'employee_leave_forwarded_balance';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'Employee_id',
        'vl_earned',
        'vl_used',
        'sl_earned',
        'sl_used',
        'date_forwarded',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_id', 'Employee_id')
                    ->select('Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'PosCode', 'OfficeCode2')
                    ->withDefault();
    }

}
