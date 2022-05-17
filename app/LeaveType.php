<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $table = 'leave_types';
    
    protected $fillable = [
        'name',
        'code',
        'description',
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
