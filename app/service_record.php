<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_record extends Model
{
    protected $fillable = [    
        'employee_id',
        'service_from_date',
        'service_to_date',
        'position_id',
        'status',        
        'salary',
        'office_name',
        'office_address',
        'leave_without_pay',
        'separation_date',
        'separation_cause',
    ];
}
