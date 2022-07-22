<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompensatoryLeave extends Model
{
    protected $fillable = [
        'employee_id',
        'overtime_type',
        'hours_rendered',
        'earned',
        'availed',
        'balance',
        'date_added',
        'remarks',
    ];

    protected $dates = [
        'date_added',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
