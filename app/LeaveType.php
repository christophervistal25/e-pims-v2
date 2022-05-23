<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $table = 'Leave_type';
    
    protected $fillable = [
        'leave_type_id',
        'description',
        'description2',
        'days_period',
        'convertible_to_cash',
        'applicable_gender',
        'required_rendered_service',
        'category',
        'editable',
    ];
    
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
