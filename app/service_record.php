<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service_record extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $appends = [
        'service_from_date_year'
    ];


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
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }

    public function StepIncrement()
    {
        return $this->belongsTo(StepIncrement::class, 'employee_id', 'employee_id');
    }
    public function SalaryAdjustment()
    {
        return $this->belongsTo(SalaryAdjustment::class, 'employee_id', 'employee_id');
    }
}
