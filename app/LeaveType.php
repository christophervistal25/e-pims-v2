<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public $connection = 'DTR_PAYROLL_CONNECTION';

    public $table = 'Leave_type';

    protected $primaryKey = 'leave_type_id';

    public $timestamps = false;

    public $keyType = 'string';


    public function getRequiredRenderedServiceAttribute($value)
    {
        return $value;
    }

    public function getEditableAttribute($value)
    {
        return strtolower($value);
    }

    public function getConvertibleToCash($value)
    {
        return strtolower($value);
    }
}
