<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveForwardedBalance extends Model
{
    use HasFactory;

    protected $primaryKey = 'forwarded_id';

    public $connection = 'E_PIMS_CONNECTION';


    public $table = 'employee_leave_forwarded_balance';

    public $timestamps = false;

    protected $fillable = [
        'forwarded_id',
        'Employee_id',
        'date_forwarded',
        'vl_balance',
        'sl_balance',
        'vawc_balance',
        'adopt_balance',
        'mandatory_balance',
        'maternity_balance',
        'paternity_balance',
        'soloparent_balance',
        'emergency_balance',
        'slb_balance',
        'study_balance',
        'spl_balance',
        'rehab_balance',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_id', 'Employee_id')
                    ->select('Employee_id', 'FirstName', 'MiddleName', 'LastName', 'Suffix', 'OfficeCode', 'PosCode', 'OfficeCode2')
                    ->withDefault();
    }

    public function records()
    {
        return $this->morphMany(EmployeeLeaveTransaction::class, 'transaction');
    }
}
