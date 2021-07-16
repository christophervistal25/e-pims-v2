<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
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
